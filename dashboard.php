<?php
require_once 'model/session.php';
require_once 'model/restaurant.php';
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
	<div class="container" style="margin-top:100px;margin-bottom:50px;min-height: 500px;">
		<? if($session->session_exist('user_type')): ?>
		<? if($session->get_session_data('user_type') == 'restaurant_owner'): ?>

		<h1>Your Restaurants</h1>
		<a href="new_restaurant.php" class="btn btn-warning" style="float:right;margin-top:-40px"><i class="fa fa-plus"></i> Add new restaurant</a>
		<div>
			<div class="col-sm-8">
			<?php

			$restaurant = new Restaurant();
			$data = $restaurant->multipleFind('owner_id',$session->get_session_data('id'));

			// var_dump($data);

			foreach ($data as $key => $value) {

				echo '<div class="row" restaurant-id="'.$value['id'].'">
				<div class="col-sm-2">
				<a href="/view-restaurant.php?id='.$value['id'].'"><img src=".'.$value['image'].'" height="90px" width="90px"></a>
				</div>
				<div class="col-sm-6">
				<a href="/view-restaurant.php?id='.$value['id'].'"><h4>'.($key+1).'. '.$value['name'].'</h4></a>
				<h4>'.$value['rating'].' star rating '.$value['review_count'].' reviews</h4>';

				switch((int)$value['status'])
				{
					case 1: echo '<span class="label label-success">Approved</span>';
						break;
					case 2: echo '<span class="label label-warning">Blocked</span>';
						break;
					case 3: echo '<span class="label label-primary">Pending Approval</span>';
						break;
				}

				echo ' <a href="/edit-restaurant.php?id='.$value['id'].'" class="label label-info"><i class="fa fa-pencil"></i> Edit</a>';
				echo ' <a href="#" class="label label-danger delete-restaurant" restaurant-id="'.$value['id'].'"><i class="fa fa-trash-o"></i> Delete</a>';

				echo '</div>
				<div class="col-sm-4">
				<h5>'.$value['address1'].'</h5>
				<h5>'.$value['address2'].'</h5>
				<h5>'.$value['phone'].'</h5>
				</div>
				</div>
				<hr>';

			}

			?>
		</div>
		</div>
		<? else: ?>
			<h1>Unauthorized!</h1>
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