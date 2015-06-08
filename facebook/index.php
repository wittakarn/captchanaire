<?php

require_once '../facebook-php-sdk-v4-4.0-dev/autoload.php';

session_start(); //Session should be active

$app_id             = '791231537640125';  //Facebook App ID
$app_secret         = 'c797f016e385594e8ed1dd53ffdd928f'; //Facebook App Secret
$required_scope     = 'public_profile, publish_actions, email'; //Permissions required
$redirect_url       = 'http://localhost/bootstrap/facebook'; //FB redirects to this page with a code

//import required class to the current scope
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication($app_id , $app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);

//try to get current user session
try {
  $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
    die(" Error : " . $ex->getMessage());
} catch(\Exception $ex) {
    die(" Error : " . $ex->getMessage());
}

if ($session){ //if we have the FB session
    $user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
    //do stuff below, save user info to database etc.
    
    echo '<pre>';
    print_r($user_profile); //Or just print all user details
    echo '</pre>';

	$post_data = array( 'link' => 'www.example.com', 'message' => 'This is test Message' );
    $response = (new FacebookRequest( $session, 'POST', '/me/feed', $post_data ))->execute()->getGraphObject();
    
}else{ 

    //display login url 
    $login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );
    echo '<a href="'.$login_url.'">Login with Facebook</a>'; 
}

?>