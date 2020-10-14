<?php
session_start();
include '../continue/server/dbConnect.php';
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $id = md5(uniqid());
    //
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $_SESSION['username'] = $username;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['email'] = $email;
    //

    $uniqueId = mysqli_real_escape_string($db, $id);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($uniqueId)) { array_push($errors, "Somthing went wrong"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }
        $AUTO = md5(uniqid());
        $url = 'https://ui-avatars.com/api/?color=FFFFFF&background='.random_color().'&format=png&size=50&rounded=true&length=2&uppercase=true&name='.$username;
        $img = '.././user-AccountImages/'.$AUTO.'.png';
        $imageFile = $AUTO.'.png';
        //copy($url, $img);
        file_put_contents($img, file_get_contents($url));
        echo $imageFile;
        $_SESSION['image'] = $imageFile;
            /*echo'<script>var data = {"name":"'.$email.'","username":"'.$username.'","firstname":"'.$firstname.'","lastname":"'.$lastname.'","email":"'.$email.'","image":"'.$imageFile.'"};localStorage.setItem("account",JSON.stringify(data));</script>';
    */
    
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO `users` (firstname, lastname, email, username, password, uniqueId, avatar, services, servicesId) 
  			  VALUES('$firstname', '$lastname', '$email','$username','$password','$uniqueId', '$imageFile', '', '')";
        mysqli_query($db, $query);
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
window.location.href="account/"+JSON.parse(localStorage.getItem("accounts")).length;
</script>';    //echo $imageFile;
        //header("Location:account/");
    }
}
?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Add Account Kabeer's Network</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
</head>
<body>
    <style>
.card{box-shadow:none!important;border:1px;border-color:#E3E5E7;border-style:solid}
.main-container {margin-top:5em!important;}
@media screen and (min-width: 600px) {
  .main-container {margin-top:0em!important;}
  .card{margin-top:5%!important;}
}
@media screen and (max-width: 600px) {
  .card{box-shadow:none!important;border:none!important}
}
}img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
display: none;}input{border-radius:10px;!important}</style>
	<div class="row gmailStyle main-contanier" >
		<div class="container-fluid">
			<div class="valign-wrapper ">
					<div style="box-shadow:nonw!important" class="col card s12 m8 l6 xl4 autoMargin setMaxWidth overflowHidden">
						<div class="row hidden" id="progress-bar">
					    <div class="progress mar-no">
					      <div class="indeterminate"></div>
					    </div>
						</div>
						<div class="clearfix mar-all pad-all"></div>

						<img src="images/kslogo.png" class="logoImage" />
						<h5 class="center-align ">Create An Account</h5>
						<p class="center-align pad-no mar-no">Continue to Kabeer's Network</p>

						<div class="clearfix mar-all pad-all"></div>
						<div id="formContainer" class="goRight">
							<form class="signUpForm" action="" method="post">
								<div class="input-fields-div autoMargin">
									<div class="row input-inline-field">
										<div class="input-field col s6">
						          <input id="first_name" type="text" class="validate"  name="firstname" >
						          <label for="first_name">First Name</label>
						        </div>
										<div class="input-field col s6">
						          <input id="last_name" type="text"  name="lastname"  class="validate">
						          <label for="last_name">Last Name</label>
						        </div>
									</div>
									<div class="input-field">
					          <input id="reg_email" type="text"  name="email"  name="username"   class="validate">
					          <label for="reg_email">Email</label>
										<span class="helper-text" data-error="wrong" data-success="right">You can pick your <strong>Email</strong> or <strong>Mobile</strong> numer as Username</span>
					        </div>
					        <div class="input-field">
					          <input id="reg_user_name" type="text" name="username"   class="validate">
					          <label for="reg_user_name">Username</label>
										<span class="helper-text" data-error="wrong" data-success="right">You can pick your <strong>Username</strong> or <strong>Mobile</strong> numer as Username</span>
					        </div>
									<div class="row input-inline-field">
										<div id="reg_passwordDiv" class="input-field col s6">
						          <input id="reg_pass_word" name="password_1"  type="password" class="validate">
						          <label for="reg_pass_word">Password</label>
											<a href="javascript:void(0)" class="showPassword" onclick="showPassword()"><i class="material-icons md-18">visibility</i></a>
						        </div>
										<div id="rePasswordDiv" class="input-field col s6">
						          <input id="re_pass_word" name="password_2" type="password" class="validate">
						          <label for="re_pass_word">Confirm</label>
						        </div>
										<div class="input-field col s12 mar-no">
											<span class="helper-text" data-error="wrong" data-success="right">Use 8 or more characters with a mix of letters, numbers & symbols</span>
										</div>
									</div>
									<!--<p>I have an account <a href="#" class="backToLogin">Login Now</a></p>-->
								</div>
								<div class="input-fields-div autoMargin right-align">
									<button type="submit" name="reg_user" onclick="register()" class="registerBtn waves-effect waves-light btn">Register</button>
								</div>
							</form>
							<div class="clearfix">
							    
							</div>
							</div>


						<div class="clearfix mar-all pad-all"></div>
			<div class="input-field col s12 mar-no">
											<span class="helper-text" style="margin-bottom:1em" data-error="wrong" data-success="right">By Registering on <b>Kabeer's Network</b> you agree to our <a href="http://drive.hosted-kabeersnetwork.unaux.com/terms.html" class="term-service">End User Agreement</a></span>
				   </div>
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
