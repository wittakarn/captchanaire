<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '791231537640125',
	'secret' => 'c797f016e385594e8ed1dd53ffdd928f'
));

$facebook->destroySession();
header("Location: index.php");
?>