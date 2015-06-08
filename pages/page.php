<?php
require_once '../class/class.image.php';

require_once '../lib/rb.php';
R::setup( 'mysql:host=localhost;dbname=qs1', 'admin', 'admin' ); //for both mysql or mariaDB

session_start();

if (isset($_POST["submit"]) &&  $_POST["submit"]) {
	$result = "CAPTCHA miss match!";
	
	if(strcmp($_SESSION['verifyCode'] , $_POST["key"]) == 0){
		$result = "CAPTCHA pass!";

		$images = $_SESSION['imageCharacters'];
		$captchas = array();

		$rowCount = R::getCell( 'SELECT max(cid) FROM captcha' );

		echo "rowCount".$rowCount;

		for($i = 0; $i < 5; $i++){
			$captchas[$i] = R::dispense('captcha');
			$captchas[$i]->cid = $rowCount + 1;
			$captchas[$i]->image_character = $images[$i]->character;
			$captchas[$i]->red = $images[$i]->r;
			$captchas[$i]->green = $images[$i]->g;
			$captchas[$i]->blue = $images[$i]->b;
			$captchas[$i]->hex = $images[$i]->hexColor;
		}

		R::storeAll($captchas);
		
	}

	echo "<pre>";
	print_r($_SESSION['imageCharacters']);
	echo "</pre>";

	echo '<script language="javascript">';
	echo 'alert("'.$result.'");';
	echo '</script>';
}

?>

<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title></title>
  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script>
	$( document ).ready(function() {
		 var start = 0;
		$("#input").keyup(function(e) {
			if(e.keyCode == 37) {
				start = new Date().getTime();
			} else if(e.keyCode == 39) {
				var elapsed = new Date().getTime() - start;
				alert("elapsed time in milliseconds is: " + elapsed);
				// start again
				start = 0;
			}
		});
	});
  </script>
  </head>
  
  <body>


<img src='image.php'>
<form action="page.php" method="post" name="verifica" onsubmit="setFocus();">
<input type="text" id="input" name="key" size=17 maxlength=15 ><br>
<input type="submit" name="submit" value="Test Code">

</form>
  </body>
</html>











