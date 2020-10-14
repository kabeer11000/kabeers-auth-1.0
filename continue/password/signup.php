<?php
          
if(isset($_GET['name'])&&isset($_GET['url'])){
  echo'
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Continue to '.$_GET['name'].'</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
</head>
<body>
<style>.text-primary{color:#68C398!important}</style>
	<div class="row gmailStyle">
		<div class="container-fluid">
			<div class="valign-wrapper screenHeight">
					<div class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden">
						<div class="row hidden" id="progress-bar">
					    <div class="progress mar-no">
					      <div class="indeterminate"></div>
					    </div>
						</div>
						<div class="clearfix mar-all pad-all"></div>

						<img src="images/kslogo.png" class="logoImage" />
						<h5 class="center-align mar-top mar-bottom formTitle">Sign In</h5>
						<p class="center-align pad-no mar-no">Continue to <span class="text-primary">'.$_GET['name'].'</span><br><small>Enter your Kabeer\'s Network Account</small></p>

						<div class="clearfix mar-all pad-all"></div>

						<div id="formContainer" class="goRight">

							<form class="loginForm" action=".././server/signup.php" method="post">
								<div class="input-fields-div autoMargin">
									<div class="input-field">
									<input type="text" hidden value="'.$_GET['url'].'" name="url">
					          <input id="user_name" type="text" class="validate" name="username">
					          <label for="user_name">Username</label>
					        </div>
									<div id="passwordDiv" class="input-field scale-transition scale-out">
					          <input id="pass_word" type="password" name="password" class="validate">
					          <label for="pass_word">Password</label>
										<a href="javascript:void(0)" class="showPassword" onclick="showPassword()"><i class="material-icons md-18">visibility</i></a>
					        </div>
									<p><a href="../../server/addAccount.php" class="createAccountNow">Creating a account</a></p>
								</div>
								<div class="input-fields-div autoMargin right-align">
									<button type="submit" name="signup_user" class="loginBtn waves-effect waves-light btn hide">Login</button>
								</div>
							</form>
							<div class="clearfix"></div>
						</div>


						<div class="clearfix mar-all pad-all"></div>
					</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/routie.min.js"></script>
	<script type="text/javascript" src="js/loginScript.js"></script>
</body>
</html>
';  
}


?>

    <style>
.main-container {margin-top:5em!important;}
@media screen and (min-width: 600px) {
  .main-container {margin-top:0em!important;}
}img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
display: none;}input{border-radius:10px;!important}</style>