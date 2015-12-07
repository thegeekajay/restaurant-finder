<?php
require_once 'model/session.php';
$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php include("./include/header.php"); ?>
	<title>Restaurant Finder</title>
</head>
<body>
	<?php include("./include/navbar.php"); ?>
	<div class="homepage-splash"></div>
	<div class="container heading1">
		<h1 style="color:white;font-size:50px;font-weight:bold">Register your Restaurants‎ and Take orders online</h1>
		<div class="col-sm-12" style="min-height: 370px;background-color: black;opacity: 0.4;position: absolute;"></div>		
		<div class="col-sm-12" style="padding:40px">
			<div class="heroFoodIcon" style="margin-top: -100px;position: absolute;float: right;right: -150px">
				<img src="./assets/images/tacos.png" class="img-responsive col-xs-5" style="float: right;">
			</div>
			<h1 style="padding-left:15px;color:white;">Who delivers ?</h1>
			<h5 style="padding-left:15px;color:white;">Enter Location</h5>
			<form class="form-inline">
				<div class="form-group col-xs-8">
					<input type="email" class="form-control input-lg" id="location" placeholder="Enter location. Eg: Hoboken" style="width:100%">
				</div>
				<button type="submit" class="btn btn-lg btn-primary">Search</button>
			</form>
		</div>
	</div>
	<div class="container" style="position:relative;z-index:1">
		<div>
			<div class="col-xs-3 text-center">
			<div style="margin:auto;background-image: url('https://www.foodpanda.com/wp-content/themes/foodpanda/img/steps_sprite.png');background-position: 0 -134px;height: 83px;width: 55px;"></div>
			<h3 style="color:#fff">1. Search</h3>
			<h5 style="color:#fff">Find restaurants that deliver to you by entering your location</h5>
			</div>

			<div class="col-xs-3 text-center">
			<div style="margin:auto;background-image: url('https://www.foodpanda.com/wp-content/themes/foodpanda/img/steps_sprite.png');background-position: 0 -267px;height: 83px;width: 81px;"></div>
			<h3 style="color:#fff">2. Choose</h3>
			<h5 style="color:#fff">Browse hundreds of menus to find the food you like</h5>
			</div>

			<div class="col-xs-3 text-center">
			<div style="margin:auto;background-image: url('https://www.foodpanda.com/wp-content/themes/foodpanda/img/steps_sprite.png');background-position: 0 -400px;height: 83px;width: 65px;"></div>
			<h3 style="color:#fff">3. Pay</h3>
			<h5 style="color:#fff">Pay fast & secure online or on delivery</h5>
			</div>

			<div class="col-xs-3 text-center">
			<div style="margin:auto;background-image: url('https://www.foodpanda.com/wp-content/themes/foodpanda/img/steps_sprite.png');background-position: 0 -533px;height: 83px;width: 61px;"></div>
			<h3 style="color:#fff">4. Enjoy</h3>
			<h5 style="color:#fff">Food is prepared & delivered to your door</h5>
			</div>
		</div>	
	</div>
	<div style="position: relative;background-color: #080808;min-height:20px;z-index: 2;margin-top: 20px;"></div>



	<div class="modal registration-form fade" role="dialog" aria-labelledby="register">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="register">User Registeration Form</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="register_form">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
							<div class="col-sm-9">
								<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Phone#</label>
							<div class="col-sm-9">
								<input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="email" name="email" class="form-control" placeholder="Email" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-9">
								<input type="password" name="password" class="form-control" placeholder="Password" required>
								<input type="hidden" name="type" class="form-control" value="restaurant_owner">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<div class="alert alert-danger" role="alert" id="register_error_block" style="margin-bottom:0px;display:none">
									<strong>Error!</strong> Username already exist.
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="register_spinner" style="display:none"></i> Register</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->




	<?php include('./include/footer.php') ?>
</body>
</html>