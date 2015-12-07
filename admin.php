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
	<div class="container" style="margin-top:100px;margin-bottom:50px">
		<h1>Restaurant List</h1>
		<div class="col-sm-8">
			<?php

			$restaurants = [];

			$restaurant['image'] = 'http://s3-media1.fl.yelpcdn.com/bphoto/M0G7F5JHEzkElBXOs1MXZA/90s.jpg';
			$restaurant['line1'] = 'The Cuban Restaurant and Bar';
			$restaurant['line2'] = '4.0 star rating 520 reviews';
			$restaurant['line3'] = '333 Washington St';
			$restaurant['line4'] = 'Hoboken, NJ 07030';
			$restaurant['line5'] = '(201) 795-9899';
			$restaurant['line6'] = 'btn-success';
			$restaurant['line7'] = 'Approve';

			array_push($restaurants,$restaurant);

			$restaurant['image'] = 'http://s3-media2.fl.yelpcdn.com/bphoto/yPQgJMnu3ur4b5O90w1uwA/90s.jpg';
			$restaurant['line1'] = 'Anthony David’s';
			$restaurant['line2'] = '4.0 star rating 325 reviews';
			$restaurant['line3'] = '953 Bloomfield St';
			$restaurant['line4'] = 'Hoboken, NJ 07030';
			$restaurant['line5'] = '(201) 222-8399';
			$restaurant['line6'] = 'btn-danger';
			$restaurant['line7'] = 'Block';
			array_push($restaurants,$restaurant);

			$restaurant['image'] = 'http://s3-media1.fl.yelpcdn.com/bphoto/1h4Mbh3QkxQa6V4H73cnmg/90s.jpg';
			$restaurant['line1'] = 'Zack’s Oak Bar & Restaurant';
			$restaurant['line2'] = '4.0 star rating 163 reviews';
			$restaurant['line3'] = '232 Willow Ave';
			$restaurant['line4'] = 'Hoboken, NJ 07030';
			$restaurant['line5'] = '(201) 653-7770';
			$restaurant['line6'] = 'btn-success';
			$restaurant['line7'] = 'Approve';
			array_push($restaurants,$restaurant);

			$restaurant['image'] = 'http://s3-media3.fl.yelpcdn.com/bphoto/yvcTzAHLGWzLxLuxctZ_WA/90s.jpg';
			$restaurant['line1'] = 'Cooper’s Union';
			$restaurant['line2'] = '4.0 star rating 94 reviews';
			$restaurant['line3'] = '104 Hudson St';
			$restaurant['line4'] = 'Hoboken, NJ 07030';
			$restaurant['line5'] = '(201) 222-3443';
			$restaurant['line6'] = 'btn-success';
			$restaurant['line7'] = 'Approve';
			array_push($restaurants,$restaurant);

			$restaurant['image'] = 'http://s3-media2.fl.yelpcdn.com/bphoto/NiWQKvW_Dt6i74QtnT3IAQ/90s.jpg';
			$restaurant['line1'] = 'Stingray Lounge';
			$restaurant['line2'] = '4.5 star rating 68 reviews';
			$restaurant['line3'] = '1210 Washington St';
			$restaurant['line4'] = 'Hoboken, NJ 07030';
			$restaurant['line5'] = '(201) 683-6030';
			$restaurant['line6'] = 'btn-success';
			$restaurant['line7'] = 'Approve';
			array_push($restaurants,$restaurant);

			$restaurant['image'] = 'http://s3-media4.fl.yelpcdn.com/bphoto/dpzEGy1i6gJR7EFP-JUY_w/90s.jpg';
			$restaurant['line1'] = 'Mamoun’s Falafel Restaurant';
			$restaurant['line2'] = '4.0 star rating 408 reviews';
			$restaurant['line3'] = '502 Washington St';
			$restaurant['line4'] = 'Hoboken, NJ 07030';
			$restaurant['line5'] = '(201) 656-0310';
			$restaurant['line6'] = 'btn-success';
			$restaurant['line7'] = 'Approve';
			array_push($restaurants,$restaurant);
			

			foreach ($restaurants as $key => $value) {

				echo '<div class="row">
				<div class="col-sm-2">
				<a href=""><img src="'.$value['image'].'"></a>
				</div>
				<div class="col-sm-6">
				<a href=""><h4>'.($key+1).'. '.$value['line1'].'</h4></a>
				<h4>'.$value['line2'].'</h4>
				</div>
				<div class="col-sm-3">
				<h5>'.$value['line3'].'</h5>
				<h5>'.$value['line4'].'</h5>
				<h5>'.$value['line5'].'</h5>
				</div>
				<div class="col-sm-1"><a class="btn '.$value['line6'].'">'.$value['line7'].'</a></div>
				</div>
				<hr>';

			}

			?>
		</div>
	</div>


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
								<input type="hidden" name="type" class="form-control" value="user">
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