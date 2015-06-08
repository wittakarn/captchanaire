<?php
require_once '../class/class.login.php';
require_once '../class/class.register.php';
require_once '../config.php';

$isLoginSuccess = false;
$url = ROOT.'/error/login-error.html';
$login = new Login();

if (isset($_POST['flogin'])) {
	
	$url = $login->getRedirectUrlFromFacebookLogin();
}else if(isset($_POST['login'])){
	$user = $login->getUser($_POST['email']);
	if($user != null){
		$isLoginSuccess = $login->verifyPassword($_POST['password']);

		if($isLoginSuccess){
			$url = ROOT;

			$_SESSION['email'] = $user->email;
			$_SESSION['first_name'] = $user->name;
			$_SESSION['last_name'] = $user->sname;
		}

	}
}else{
	$facebookUser = $login->getFacebookUser();

	if(!is_null($facebookUser)){
		$register = new Register();
		$register->email = $facebookUser['email'];
		$register->loginType = 'F';
		$register->name = $facebookUser['first_name'];
		$register->sname = $facebookUser['last_name'];
		$register->createFacebookUser($facebookUser['email']);

		$url = ROOT;
		$_SESSION['email'] = $facebookUser['email'];
		$_SESSION['first_name'] = $facebookUser['first_name'];
		$_SESSION['last_name'] = $facebookUser['last_name'];
	}
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="<?php echo "1;url=".$url ?>">
        <title>Page Redirection</title>
    </head>
    <body>
        <!-- Note: don't tell people to `click` the link, just tell them that it is a link. -->
        If you are not redirected automatically, follow the <a href="<?php echo $url ?>">link</a>
    </body>
</html>