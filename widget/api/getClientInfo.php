<?php
session_start();
include '../.././continue/server/dbConnect.php';
/*if(isset($_GET['client_secret'])&&$SESSION['sdk_token_']){
    $cl = htmlspecialchars($_GET['client_secret']);
    $q = "SELECT * FROM `clients` WHERE `uniqid` = '$cl' LIMIT 1";
}*/
if(isset($_GET['client_secret'])&&isset($_SESSION['session_token'])){
    $cl = base64_decode($_GET['client_secret']);
    echo $cl;
    $q = "SELECT * FROM `clients` WHERE `uniqueId` = '$cl' LIMIT 1";
    print_r(json_encode(mysqli_fetch_assoc(mysqli_query($db,$q))));
}
//echo  json_encode($_SERVER);