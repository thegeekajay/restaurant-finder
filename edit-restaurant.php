<?php
require_once 'model/session.php';
$session = new Session();
if (isset($_GET['id'])) {
	require_once 'model/restaurant.php';

	$restaurant = new Restaurant();

	$data = $restaurant->find('id',$_GET['id']);
}

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
		<? if($session->session_exist('user_type')): ?>
		<? if($data != NULL): ?>
		<? if($session->get_session_data('user_type') == 'restaurant_owner' && $session->get_session_data('id') == $data['owner_id']): ?>
		<h1>Edit Restaurant</h1>
		<div class="col-sm-8">
			<form class="form-horizontal" id="edit_restaurant">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Restaurant Name</label>
							<div class="col-sm-9">
								<input type="text" name="name" value="<?= $data['name']; ?>" class="form-control" placeholder="Restaurant Name" required>
								<input type="hidden" name="restaurant_id" value="<?= $data['id']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Address 1</label>
							<div class="col-sm-9">
								<input type="text" name="address1" value="<?= $data['address1']; ?>" class="form-control" placeholder="Address Line 1" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Address 2</label>
							<div class="col-sm-9">
								<input type="text" name="address2" value="<?= $data['address2']; ?>" class="form-control" placeholder="Address Line 2" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">city</label>
							<div class="col-sm-9">
								<input type="text" name="city" value="<?= $data['city']; ?>" class="form-control" placeholder="city" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">State</label>
							<div class="col-sm-9">
								<input type="text" name="state" value="<?= $data['state']; ?>" class="form-control" placeholder="State" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Zipcode</label>
							<div class="col-sm-9">
								<input type="number" name="zipcode" value="<?= $data['zipcode']; ?>" class="form-control" placeholder="Zipcode" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Phone</label>
							<div class="col-sm-9">
								<input type="number" name="phone" value="<?= $data['phone']; ?>" class="form-control" placeholder="Phone" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Image</label>
							<div class="col-sm-9">
								<input type="file" id="exampleInputFile" name="image" >
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Open Time</label>
							<div class="col-sm-9">
								<input type="time" name="open_time" value="<?= $data['open_time']; ?>" class="form-control" placeholder="Open Time" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Close Time</label>
							<div class="col-sm-9">
								<input type="time" name="close_time" value="<?= $data['close_time']; ?>" class="form-control" placeholder="Close Time" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Latitude</label>
							<div class="col-sm-9">
								<input type="text" name="pos_lat" value="<?= $data['pos_lat']; ?>" class="form-control" placeholder="Latitude Position" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Longitude</label>
							<div class="col-sm-9">
								<input type="text" name="pos_lon" value="<?= $data['pos_lon']; ?>" class="form-control" placeholder="Longitude Position" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="register_spinner" style="display:none"></i> Submit</button>
							</div>
						</div>
					</form>
		</div>
		<? else: ?>
	<h1>Unauthorized!</h1>
<? endif; ?>
<? else: ?>
<h1>Restaurant Not Found!</h1>
<? endif; ?>

<? else: ?>
<h1>Non-Authenticated</h1>

<? endif; ?>
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