<?php session_start(); ?>

<link rel="stylesheet" href="<?php echo ROOT.'/css/template.css' ?>">

<nav class="navbar navbar-inverse navbar-fixed-top"><div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#">Captchanaire</a>
	</div>
	<div id="navbar" class="collapse navbar-collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="<?php echo ROOT.'/index.php' ?>">Home</a></li>
		<li><a href="#about">About</a></li>
		<li><a href="#contact">Contact</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li>
			<?php
				if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
					echo '<li id="fat-menu" class="dropdown">
							  <a id="user-option" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="true">
								<span class="glyphicon glyphicon-user"></span> '.$_SESSION['email'].'
								<span class="caret"></span>
							  </a>
							  <ul class="dropdown-menu" role="menu" aria-labelledby="user-option">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-refresh"></span> Change password</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="'.ROOT.'/pages/log-out.php"><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
							  </ul>
							</li>';
				}else{
					echo '<a href="#" onclick="$(\'#sign-in-model\').modal(\'show\')"><span class="glyphicon glyphicon-log-in"></span> sign in</a>';
				}
			?>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</nav>

<?php include "sign-in-model.php" ?>