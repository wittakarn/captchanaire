<?php require_once('config.php'); ?>

<script>
	
	$( document ).ready(function() {
		$( "#loginf" ).click(function() {
		  $("input").prop('required',false);
		});
	});
</script>
<div 
id="sign-in-model"
class="modal fade bs-example-modal-sm" 
tabindex="-1" 
role="dialog"
aria-labelledby="mySmallModalLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
		<form class="form-signin" action="<?php echo ROOT.'/components/login-module.php'?>" method="post">
			<div class="modal-header">
				<h2 class="form-signin-heading">Please sign in</h2>
			</div>
			<div class="modal-body">
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox">
				  <label>
					<input type="checkbox" value="remember-me"> Remember me
				  </label>
				</div>
				<a href="<?php echo ROOT.'/pages/sign-up.php' ?>">Sign Up</a>
			</div>
			<div class="modal-footer">
				<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
				<button class="btn btn-lg btn-primary btn-block" id="loginf" name="flogin" type="submit">Login with Facebook</button>
			</div>
		  </form>
	</div>
  </div>
</div>