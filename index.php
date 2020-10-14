<?php
include "continue/server/dbConnect.php";
include "continue/server/SessionDestroy.php";
session_start();
function parse_url_all($url){
    $url = substr($url,0,4)=='http'? $url: 'http://'.$url;
    $d = parse_url($url);
    $tmp = explode('.',$d['host']);
    $n = count($tmp);
    if ($n>=2){
        if ($n==4 || ($n==3 && strlen($tmp[($n-2)])<=3)){
            $d['domain'] = $tmp[($n-3)].".".$tmp[($n-2)].".".$tmp[($n-1)];
            $d['domainX'] = $tmp[($n-3)];
        } else {
            $d['domain'] = $tmp[($n-2)].".".$tmp[($n-1)];
            $d['domainX'] = $tmp[($n-2)];
        }
    }
    return $d;
}

function decrypt($string,$decryption_key){
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = '1234567891011121';
    $decryption=openssl_decrypt ($string, $ciphering,$decryption_key, $options, $decryption_iv);
return $decryption;
}
if(isset($_GET['action'])&&isset($_GET['redirect'])&&isset($_GET['clientId'])&&isset($_GET['key'])){
//   destroy();
    if (strip_tags($_GET['action'])=="login"){
        $redirect = strip_tags($_GET['redirect']);
        $clientId = decrypt($_GET['clientId'],$_GET['key']);
        $query = "SELECT * FROM `clients` WHERE `uniqueId` = '".$clientId."' LIMIT 1";
        $results = mysqli_fetch_assoc(mysqli_query($db, $query));
        if ($results['uniqueId'] == $clientId) {
        $_SESSION['action'] = 'login';
            if(parse_url($results['redirect_domain'])['host'] == parse_url($redirect)['host']){
                $_SESSION['token'] = md5(uniqid().uniqid()).md5(uniqid().uniqid());
                $_SESSION['domain'] = $redirect;
                if(isset($_GET['f'])){
                    if(isset($_GET['bg'])){
                        echo '<script>window.location.href="continue/AccountLogin.php?url='.strip_tags($_GET['redirect']).'&name='.strip_tags($results['name']).'&action=login&token='.$_SESSION['token'].'&bg='.htmlspecialchars($_GET['bg']).'#hasPassword";</script>';
                    }else{
                        echo '<script>window.location.href="continue/AccountLogin.php?url='.strip_tags($_GET['redirect']).'&name='.strip_tags($results['name']).'&action=login&token='.$_SESSION['token'].'#hasPassword";</script>';
                    }
                }else{
                    // header('continue/login.php?url='.strip_tags($_GET['redirect']).'&clientId='.strip_tags($_GET['clientId']).'&name='.strip_tags($results['name']).'#hasPassword');
                    echo '<script>window.location.href="continue/login.php?url='.strip_tags($_GET['redirect']).'&clientId='.strip_tags($_GET['clientId']).'&name='.strip_tags($results['name']).'&token='.$_SESSION['token'].'#hasPassword";</script>';
                }
            }else{
             //echo parse_url($results['redirect_domain'])['host'].'<br>'.parse_url($_GET['redirect'])['host'];
  //           header('Content-Type: application/json');
//             header("HTTP/1.0 400 Invalid Domain");
                echo 'Invalid domain';
                echo decrypt($_GET['clientId'],$_GET['key']);

            }
        }else{
            header("Location:".$redirect);
        }
}else{
        $_GET['clientId'] = decrypt($_GET['clientId'],$_GET['key']);
        $redirect= strip_tags($_GET['redirect']);
        $clientId = strip_tags($_GET['clientId']);
        $query = "SELECT * FROM `clients` WHERE `uniqueId` = '".$clientId."'";
        $results = mysqli_query($db, $query);
        $results = mysqli_fetch_assoc($results);
        if ($results['uniqueId'] == $clientId) {
        $_SESSION['action'] = 'signup';
            if(parse_url($results['redirect_domain'])['host'] == parse_url($redirect)['host']){
                $_SESSION['token'] = md5(uniqid().uniqid()).md5(uniqid().uniqid());
                $_SESSION['domain'] = $redirect;
                if(isset($_GET['f'])){
                    if(isset($_GET['bg'])){
                        echo '<script>window.location.href="continue/AccountLogin.php?url='.strip_tags($_GET['redirect']).'&name='.strip_tags($results['name']).'&action=signup&token='.$_SESSION['token'].'&bg='.htmlspecialchars($_GET['bg']).'#hasPassword";</script>';
                    }else{
                        echo '<script>window.location.href="continue/AccountLogin.php?url='.strip_tags($_GET['redirect']).'&name='.strip_tags($results['name']).'&action=signup&token='.$_SESSION['token'].'#hasPassword";</script>';
                    }
                }else{
                    //header('continue/signup.php?url='.strip_tags($_GET['redirect']).'&clientId='.strip_tags($_GET['clientId']).'&name='.strip_tags($results['name']).'#hasPassword');
                    echo '<script>window.location.href="continue/signup.php?url='.strip_tags($_GET['redirect']).'&clientId='.strip_tags($_GET['clientId']).'&name='.strip_tags($results['name']).'&token='.$_SESSION['token'].'#hasPassword";</script>';
                }
            }else{
              header('Content-Type: application/json');
              header("HTTP/1.0 400 Invalid Domain");
               echo 'Invalid domain';
            }
        }else{
            header("Location:".$redirect);
        }
    }
}else{
    header('Location:server/account/');
}