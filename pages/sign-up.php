<?php require_once "../config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.js"></script>
  <script>
	$( document ).ready(function() {
		$('#passwordConfirmation').keyup(function () {
			if ($('#password').val() == $(this).val()) {
				$(this)[0].setCustomValidity('');
			} else {
				$(this)[0].setCustomValidity('Passwords must match');
			}
		});
	});
  </script>
</head>
<body>

    <?php include '../components/nav-bar.php';?>
    <div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form id="identicalForm" role="form" action="<?php echo ROOT.'/pages/sign-up-result.php'?>" method="post">
					<h2>Please Sign Up</h2>
					<hr class="colorgraph">
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="1" required>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="firstName" id="firstName" class="form-control input-lg" placeholder="First Name" tabindex="2" required>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="lastName" id="lastName" class="form-control input-lg" placeholder="Last Name" tabindex="3" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="4" required>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirmation" id="passwordConfirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6" required>
							</div>
						</div>
					</div>
					
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<input type="submit" 
										id="register"
										name="register"
										value="Register" 
										class="btn btn-primary btn-block btn-lg" 
										tabindex="7">
						</div>
						<div class="col-xs-12 col-md-6"><a href="sign-in.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
					</div>
				</form>
			</div>
		</div>

    </div><!-- /.container -->

</body>
</html>
