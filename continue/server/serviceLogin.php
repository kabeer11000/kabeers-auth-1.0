<?php
include "dbConnect.php";
$errors = [];
session_start();
include 'SessionDestroy.php';

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
if($_POST['token']!=$_SESSION['token']){header("HTTP/1.0 400 Invalid Token. Bad Request");echo 'Invalid Token';exit;}
if($_POST['url']!=$_SESSION['domain']){header("HTTP/1.0 400 Invalid Token. Bad Request");echo 'Invalid Redirect Domain';exit;}
    $redirectUrl = $_POST['url'];
    $action = $_POST['action'];

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $find_id_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $id_query_result = mysqli_query($db, $query);
            $id_query_result = mysqli_fetch_assoc($id_query_result);
$id_query_result['image'] = 'http://auth.kabeersnetwork.rf.gd/user-AccountImages/'.$id_query_result['avatar'];
$email = $id_query_result['email'];
$username = $id_query_result['username'];
$password = $id_query_result['password'];
$firstname = $id_query_result['firstname'];
$lastname = $id_query_result['lastname'];
$imageFile = $id_query_result['image'];
destroy();
echo '
<script> if(localStorage.getItem("accounts")===null) {
    var data=[];
    data.push( {
        "username": "'.$username.'", "email": "'.$email.'", "password": "'.$password.'", "firstname": "'.$firstname.'", "lastname": "'.$lastname.'","image":"'.$imageFile.'"
    }
    );
    localStorage.setItem("accounts", JSON.stringify(data));
}

else {
    var data=JSON.parse(localStorage.getItem("accounts"));
    var currentData= {
            "username": "'.$username.'", "email": "'.$email.'", "password": "'.$password.'", "firstname": "'.$firstname.'", "lastname": "'.$lastname.'","image":"'.$imageFile.'"};


    if(JSON.stringify(data).includes(JSON.stringify(currentData))) {}
    else {
        data.push({
        "username": "'.$username.'", "email": "'.$email.'", "password": "'.$password.'", "firstname": "'.$firstname.'", "lastname": "'.$lastname.'","image":"'.$imageFile.'"});
        localStorage.setItem("accounts", JSON.stringify(data));
       }
    }
function inIframe() {
    try {
        return window.self !== window.top;
    } catch (e) {
        return true;
    }
}
if(inIframe()){
parent.postMessage("child frame", "*");
//    parent.IframeHide();
}

window.location.href="'.$redirectUrl.'?username='.$id_query_result['username'].'&email='.$id_query_result['email'].'&password='.$id_query_result['password'].'&firstname='.$id_query_result['firstname'].'&lastname='.$id_query_result['lastname'].'&img='.$id_query_result['image'].'&action='.$action.'";
</script>';
//array_push($errors, 'Taking you to the target Site');

        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
foreach($errors as $e){
    print_r($e);
}
?>