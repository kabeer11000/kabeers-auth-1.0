<?php session_start();
if($_GET['token']!=$_SESSION['token']){header("HTTP/1.0 400 Invalid Token. Bad Request");echo 'Invalid Token';exit;}
//if(urldecode($_GET['domain'])!=$_SESSION['domain']){header("HTTP/1.0 400 Invalid Domain. Bad Request");echo 'Invalid Domain';exit;}
?>

<title>Continue To <?php echo $_GET['name'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<link rel="shortcut icon" type="image/png" href="ic_launcher.png"/>
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
var colours = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"];
    $(document).ready(function(){
        if (localStorage.getItem('accounts') != null) {
            var data = JSON.parse(localStorage.getItem("accounts") && JSON.parse(localStorage.getItem('accounts')).length > -1);
            for(var i = 0; i < data.length; i++){
                var color = colours[Math.floor(Math.random() * colours.length)].substr(1);
                $('.main').append('<li class="accountFF"><form action="server/signup-chooser.php" class="form" method="post"><input type="text" name="token" value="<?php echo $_GET['token']; ?>" class="w-0"><input type="text" name="url" value="<?php echo $_GET['url']; ?>" class="w-0"><input name="username" value="'+data[i].username+'" class="w-0"><input name="password" value="'+data[i].password+'" class="w-0"> <button type="submit" name="login_user" class="px-2"> <img class="account-image" alt="" src="https://ui-avatars.com/api/?color=FFFFFF&background='+color+'&format=png&size=250&rounded=true&length=2&name='+data[i].username+'"/> <span class="account-name">'+data[i].username+'</span> <span class="account-email text-muted">'+data[i].email+' </span> </button></form> </li>');
            }
        }else{
            window.location.href="AccountLogin.php?url=<?php echo $_GET['url']; ?>&name=<?php echo $_GET['name']; ?>&action=login&token=<?php echo $_GET['token'];?>#hasPassword";
        }

        $('.removeAll').click(function () {
            localStorage.removeItem('accounts');
            window.location.href="AccountLogin.php?url=<?php echo $_GET['url']; ?>&name=<?php echo $_GET['name']; ?>&action=login&token=<?php echo $_GET['token'];?>#hasPassword";
        })
        
    });</script>
<style>
@keyframes fadeIn {
  from {
  transform:scale(0.80);
  opacity:0;
  margin-top:5rem
  }
  to {
  transform:scale(1);
  opacity:1;
  //margin-top:0rem
  }
}
@keyframes slideLeft {
  from {
  opacity:0;
  margin-left:5rem
  }
  to {
  opacity:1;
  margin-right:0rem
  }
}
.main{
    animation-name:slideLeft;
    animation-duration:0.7s
}
.snippet{
    animation-name:fadeIn;
    animation-duration:0.5s
}
*{margin:0;padding:0;box-sizing:border-box;}.w-0{width:0!important;display:none}.snippet{transition-duration: 0.75s;}@media(min-width: 600px){.snippet{width: 40%;margin-top: 5%}}</style>
<div class="container bootstrap snippet" style="
justify-content: center; align-items: center;">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 d-flex justify-content-center my-2">
            <div style="width: 3em;">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 3em;" viewBox="0 0 1528 1528"><defs><linearGradient id="a" x1="0.611" y1="0.882" x2="0.291" y2="0.158" gradientUnits="objectBoundingBox"><stop offset="0" stop-color="#4e5aa0"></stop><stop offset="1" stop-color="#4c5da9"></stop></linearGradient><linearGradient id="b" x1="0.5" x2="0.5" y2="1" gradientUnits="objectBoundingBox"><stop offset="0" stop-color="#6b91c8"></stop><stop offset="1" stop-color="#618ac3"></stop></linearGradient><linearGradient id="c" x1="0.5" y1="1" x2="0.5" gradientUnits="objectBoundingBox"><stop offset="0" stop-color="#6fc69d"></stop><stop offset="1" stop-color="#66c296"></stop></linearGradient></defs><g transform="translate(-20.5 -20.5)"><path d="M784.5,1548V21C362.83,21,21,362.83,21,784.5S362.83,1548,784.5,1548Z" fill="#d3e1f2" stroke="#fff" stroke-width="1" fill-rule="evenodd"></path><path d="M256,1548V21c421.67,0,763.5,341.83,763.5,763.5S677.67,1548,256,1548Z" transform="translate(528.5)" fill="#5364ae" stroke="#fff" stroke-width="1" fill-rule="evenodd"></path><path d="M756.391,0l-147,1453.093L.669,795.781Q0,779.634,0,763.468C0,344.17,338,3.818,756.391,0Z" transform="translate(1548 1547.968) rotate(180)" stroke="#fff" stroke-width="1" fill-rule="evenodd" fill="url(#a)"></path><path d="M534.868,1548V21C312.371,21,132,362.83,132,784.5S312.371,1548,534.868,1548Z" transform="translate(249.632)" stroke="#fff" stroke-width="1" fill-rule="evenodd" fill="url(#b)"></path><path d="M402.868,0V1527C180.371,1527,0,1185.17,0,763.5S180.371,0,402.868,0Z" transform="translate(1187.368 1548) rotate(180)" stroke="#fff" stroke-width="1" fill-rule="evenodd" fill="url(#c)"></path></g></svg>
                </div>
            </div>
            <div class="account-wall accountchooser">
                <h1 class="title text-center">
                    Choose an account<br><small class="text-muted text-center">Continue to <?php echo $_GET['name'];?></small></h1>
                <ol class="accounts main">

                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="account-wall accountchooser action">
                <ul>
                    <li><a href="AccountLogin.php?url=<?php echo $_GET['url']; ?>&name=<?php echo $_GET['name']; ?>&action=signup&token=<?php echo $_GET['token'];?>#hasPassword">Add account </a></li>
                    <li><a href="#" class="removeAll">Remove All</a></li></ul>
            </div>
        </div>
    </div>
</div>
<br><br>
<style>.accountFF:hover{background-color: #FAFAFA}.accountFF:active{background-color: #F1F1F1;}</style>
<style type="text/css"> .main form{} .main form button{ margin-top: 0!important;margin-bottom: 0!important;padding-top: 0!important;padding-bottom:0!important; } .main{ align-items: center; } .main form hr{ margin: 0; }</style><style type="text/css"> .form-signin { max-width: 330px; padding: 15px; margin: 0 auto; padding-top: 5px;}.account-wall { margin-top: 20px; padding: 20px 25px 30px; background-color: #FFF; -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;border-style: solid;border-width: 1px;border-color: rgba(0, 0, 0, 0.1);border-radius:5px;}.logo { margin: 25px auto 20px; float: none; display: block; height: 38px; width: 116px;}.title { font-size: 20px; color: #262626; margin: 0 0 15px; font-weight: normal;}.accountchooser ol { width: 100%; margin: 0; list-style: none; padding: 0;}.accountchooser ol li { height: 76px; border-top: 1px solid #d5d5d5;}.accountchooser ol li button { padding: 15px 0; display: block; width: 100%; height: 100%; outline: none; border: 0; cursor: pointer; text-align: left; background: url(arrow_right_1x.png) right center no-repeat; background-size: 21px 21px;}.accountchooser ol li button img { float: left; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; height: 46px; width: 46px;}.accountchooser ol li button span.account-name { font-weight: bold; font-size: 16px; padding-top: 3px; color: #427fed;}.accountchooser ol li button span { display: block; margin-left: 58px; padding-right: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}.action { padding: 5px;}.action ul { width: 100%; margin: 0; list-style: none; padding: 0;}.action ul li:first-child { border-right: 1px solid #d5d5d5;}.action ul li { width: 49%; display: inline-block;}.action ul li a { color: #427fed; cursor: pointer; text-decoration: none; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; width: 100%; display: inline-block; background: none; text-align: center; padding: 12px 0; outline: none; text-decoration: none; border: 0;} </style>
