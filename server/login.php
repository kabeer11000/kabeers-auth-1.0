<?php
include "dbConnect.php";
$errors = [];

function encrypt($string,$encryption_key){

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption = openssl_encrypt($string, $ciphering,
        $encryption_key, $options, $encryption_iv);
    return $encryption;
}
if (isset($_POST['login_user'])) {
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
    $url = strip_tags($_POST['url']);
            
echo '<script> if(localStorage.getItem("accounts")===null) { var data=[]; data.push( { "username": "'.$id_query_result['username'].'", "email": "'.$id_query_result['email'].'", "password": "'.$id_query_result['password'].'", "firstname": "'.$id_query_result['firstname'].'", "lastname": "'.$id_query_result['lastname'].'" } ); localStorage.setItem("accounts", JSON.stringify(data));}else { var data=JSON.parse(localStorage.getItem("accounts")); var currentData= { "username": "'.$id_query_result['username'].'", "email": "'.$id_query_result['email'].'", "password": "'.$id_query_result['password'].'", "firstname": "'.$id_query_result['firstname'].'", "lastname": "'.$id_query_result['lastname'].'"}; if(JSON.stringify(data).includes(JSON.stringify(currentData))) {} else { data.push({ "username": "'.$id_query_result['username'].'", "email": "'.$id_query_result['email'].'", "password": "'.$id_query_result['password'].'", "firstname": "'.$id_query_result['firstname'].'", "lastname": "'.$id_query_result['lastname'].'"}); localStorage.setItem("accounts", JSON.stringify(data)); } }</script>';

echo '<script>window.location.href="'.$url.'?username='.$id_query_result['username'].'&name='.$id_query_result['firstname'].'&surname='.$id_query_result['lastname'].'&email='.$id_query_result['email'].'&action=login&password='.$id_query_result['password'].'&img='.$id_query_result['avatar'].';</script>';

               exit;
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
