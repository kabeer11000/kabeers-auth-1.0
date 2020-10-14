<?php
session_start();
if(isset($_GET['sdk_token_'])){
    if(strlen($_GET['sdk_token_'])==13){
        $SESSION['sdk_token_'] = md5(uniqid().uniqid());
        echo $SESSION['sdk_token_'];
    }
}
