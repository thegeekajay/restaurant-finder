<?php
require_once 'model/session.php';
$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php include("./include/header.php"); ?>
	<title>The Cuban Restaurant and Bar</title>
</head>
<body>
	<?php include("./include/navbar.php"); ?>
	<div class="container" style="margin-top:100px;margin-bottom:50px">
		<div class="row">
			<span style="font-size: 30px;font-weight: bold;">Delivery Address</span>
			<a style="float:right" class="btn btn-primary" data-toggle="modal" data-target=".delivery-address"><i class="fa fa-plus"></i> Add new</a>
			<hr>
			<div class="col-sm-4" style="padding:20px;border: 1px solid rgba(0, 105, 197, 0.26);background-color: rgba(0, 105, 197, 0.26);">
				<h5>106, Griffith Street</h5>
				<h5>Apartment #B2</h5>
				<h5>Jersey City, NJ - 07307</h5>
				<h5>Ph - (201)-551-9278</h5>
			</div>
			<div class="col-sm-4 col-sm-offset-1" style="padding:20px;border:1px solid #bbb">
				<h5>201, Central Ave</h5>
				<h5>First Floor</h5>
				<h5>Jersey City, NJ - 07307</h5>
				<h5>Ph - (551)-225-8676</h5>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<span style="font-size: 30px;font-weight: bold;">Credit Card</span>
			<a style="float:right" class="btn btn-primary" data-toggle="modal" data-target=".credit-card"><i class="fa fa-plus"></i> Add new</a>
			<hr>
			<div class="col-sm-4"  style="padding:20px;border:1px solid #bbb" >
				<h5>Citi Credit Card</h5>
				<h5>XXXX-XXXX-XXXX-7567</h5>
			</div>
			<div class="col-sm-4 col-sm-offset-1" style="padding:20px;border: 1px solid rgba(0, 105, 197, 0.26);background-color: rgba(0, 105, 197, 0.26);">
				<h5>PNC Debit Card</h5>
				<h5>XXXX-XXXX-XXXX-9361</h5>
			</div>
		</div>
		<br><hr><br>
		<a class="btn btn-primary btn-lg" style="float:right"><span class="fa fa-forward"></span> Confirm Payment</a>
	</div>






<div class="modal fade credit-card" role="dialog" aria-labelledby="register">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="register">Add New Credit Card</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="register_form">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Label</label>
							<div class="col-sm-9">
								<input type="text" name="first_name" class="form-control" placeholder="Label ex. Citi Credit Card" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Card #</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Card Number ex. XXXX-XXXX-XXXX-XXXX" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Expiry Date</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Expiry Date" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">CVV</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="CVV" required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Name on the card</label>
							<div class="col-sm-9">
								<input type="text" name="last_name" class="form-control" placeholder="Name on the card Ex. John Doe" required>
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
								<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="register_spinner" style="display:none"></i> Add New Credit Card</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->





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