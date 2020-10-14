<?php
include "dbConnect.php";
$errors = [];
$allowedOrigins = array(
  '(http(s)://)?(www\.)?app-kabeersnetwork\000webhostapp\.com'
);
 
if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
  foreach ($allowedOrigins as $allowedOrigin) {
    if (preg_match('#' . $allowedOrigin . '#', $_SERVER['HTTP_ORIGIN'])) {
      header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
      header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
      header('Access-Control-Max-Age: 1000');
      header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
      break;
    }
  }
}
if (isset($_POST['password'])&&isset($_POST['username'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {


            $find_id_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $id_query_result = mysqli_query($db, $query);
            $id_query_result = mysqli_fetch_assoc($id_query_result);
            $JSON =
                '{
            "username":"'.$id_query_result['username'].'",
            "email":"'.$id_query_result['email'].'",
            "firstname":"'.$id_query_result['firstname'].'",
            "lastname":"'.$id_query_result['lastname'].'",
            "password":"'.md5($id_query_result['password'].sha1("KabeersNetworkKey")).'"
            }';
            echo $JSON;
/*            $url = strip_tags($_GET['url']);
            $content = json_encode($JSON);

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json"));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            $json_response = curl_exec($curl);

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ( $status != 201 ) {
                die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
            }


            curl_close($curl);

            $response = json_decode($json_response, true);

            header("Location:".$url);   */
            exit;
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
