<?php 
require_once "../config.php";
require_once "../class/class.register.php";
require_once "../class/class.mail.php";

if ( !empty($_POST) && "" != trim($_POST['email'])) {

	echo $_POST['firstName'].'<br/>';
	echo $_POST['lastName'].'<br/>';
	echo $_POST['email'].'<br/>';
	echo $_POST['password'];

	$register = new Register();
	$register->email = $_POST['email'];
	$register->password = $_POST['password'];
	$register->loginType = 'N';
	$register->name = $_POST['firstName'];
	$register->sname = $_POST['lastName'];

	$register->create();
	$description = "Your account has been successfully registered. Please check your email for the verification link to activate your account.";
	// send an email.
	$mail = new Mailer();
	$subject = 'Please verify your email '.$register->email;
	$body = 'Hey, we want to verify that you are indeed '.$register->name.'.  Verifying this address will let you receive notifications and password resets from GitHub.  If you wish to continue, please follow the link below:<br/>xxxx<br/> If you\'re not '.$register->name.' or didn\'t request verification, you can ignore this email.';
	$status = $mail->send($register->email, $register->name, $subject, $body);
}else{
	$description = "You have registered unsuccess. Please try again next time.";
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="<?php echo "10;url=".ROOT ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<?php echo $description; ?>
        <!-- Note: don't tell people to `click` the link, just tell them that it is a link. -->
        If you are not redirected automatically, follow the <a href="<?php echo $url ?>">link</a>
    </body>
</html>
