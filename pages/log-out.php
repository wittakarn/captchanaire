<?php 
require_once "../config.php";

session_start();
session_destroy();

?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="<?php echo "1;url=".ROOT ?>">
        <title>Page Redirection</title>
    </head>
    <body>
        <!-- Note: don't tell people to `click` the link, just tell them that it is a link. -->
        If you are not redirected automatically, follow the <a href="<?php echo $url ?>">link</a>
    </body>
</html>
