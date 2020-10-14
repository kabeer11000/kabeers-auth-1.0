<?php
function destroy(){
    session_destroy();
   // unset($_SESSION['token']);
   // unset($_SESSION['domain']);
}