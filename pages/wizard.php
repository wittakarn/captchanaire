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
  $(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })    
});
  </script>
</head>
<body>

    <?php include '../components/nav-bar.php';?>
    <div class="container">
		<div class="row form-group">
			<div class="col-xs-12">
				<ul class="nav nav-pills nav-justified thumbnail setup-panel">
					<li class="active"><a href="#step-1">
						<h4 class="list-group-item-heading">Step 1</h4>
						<p class="list-group-item-text">First step description</p>
					</a></li>
					<li class="disabled"><a href="#step-2">
						<h4 class="list-group-item-heading">Step 2</h4>
						<p class="list-group-item-text">Second step description</p>
					</a></li>
					<li class="disabled"><a href="#step-3">
						<h4 class="list-group-item-heading">Step 3</h4>
						<p class="list-group-item-text">Third step description</p>
					</a></li>
				</ul>
			</div>
		</div>
		<div class="row setup-content" id="step-1">
			<div class="col-xs-12">
				<div class="col-md-12 well text-center">
					<h1> STEP 1</h1>
					<button id="activate-step-2" class="btn btn-primary btn-lg">Activate Step 2</button>
				</div>
			</div>
		</div>
		<div class="row setup-content" id="step-2">
			<div class="col-xs-12">
				<div class="col-md-12 well">
					<h1 class="text-center"> STEP 2</h1>
				</div>
			</div>
		</div>
		<div class="row setup-content" id="step-3">
			<div class="col-xs-12">
				<div class="col-md-12 well">
					<h1 class="text-center"> STEP 3</h1>
				</div>
			</div>
		</div>
    </div><!-- /.container -->

</body>
</html>
