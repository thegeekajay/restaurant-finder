<?php
require_once 'model/session.php';
$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php include("./include/header.php"); ?>
	<title>Confirmation</title>
</head>
<body>
	<?php include("./include/navbar.php"); ?>
	<div class="container" style="margin-top:100px;margin-bottom:50px">
		<h1>Order Placed Successfully</h1>
		<div class="col-sm-4 col-sm-offset-2">
			<img src="http://www.clipartbest.com/cliparts/Rcd/gob/Rcdgobr9i.gif" class="img-responsive">
		</div>
	</div>






<div class="modal fade delivery-address" role="dialog" aria-labelledby="register">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="register">New Delivery address</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="register_form">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Line 1</label>
							<div class="col-sm-9">
								<input type="text" name="first_name" class="form-control" placeholder="Line 1" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Line 2</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Line 2" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">City</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="City" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">State</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="State" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Zipcode</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Zipcode" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Phone Number" required>
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
								<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="register_spinner" style="display:none"></i> Add New Address</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->








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