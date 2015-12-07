<?php
require_once 'model/session.php';
$session = new Session();

$data = NULL;
$menu_data = [];

if (isset($_GET['id'])) {
	require_once 'model/restaurant.php';
	require_once 'model/menu.php';
	require_once 'model/review.php';

	$restaurant = new Restaurant();
	$menu = new Menu($_GET['id']);
	$review = new Review();

	$data = $restaurant->find('id',$_GET['id']);
	$menu_data = $menu->multipleFind('restaurant_id',$_GET['id']);
	$reviews = $review->showReview($_GET['id']);
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
		<div class="row">
			<div class="col-sm-8">
				<h1><?=$data['name'];?></h1>
				<div class="col-sm-4">
					<img src="<?=$data['image']?>" class="img-responsive">
				</div>
				<div class="col-sm-8">
					<h4><?=$data['rating'];?> star rating <?=$data['review_count'];?> reviews</h4>
					<h5>Time <?= date("h:i:A", strtotime($data['open_time']));?> - <?= date("h:i:A", strtotime($data['close_time']));?></h5>
					<br>
					<h4><?=$data['address1'];?></h4>
					<h4><?=$data['address2'];?></h4>
					<h4><?=$data['phone'];?></h4>
				</div>
			</div>
			<div class="col-sm-4">
				<img src="https://maps.googleapis.com/maps/api/staticmap?zoom=15&size=300x300&maptype=roadmap%20&markers=color:blue%7Clabel:S%7C<?=$data['pos_lat']?>,<?=$data['pos_lon']?>" class="img-responsive" width="250px" style="border:10px solid rgba(103, 103, 103, 0.07)">
			</div>
		</div>
		<hr>

		<div>

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menu</a></li>
				<li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews</a></li>
			</ul>
			<!-- <a class="btn btn-warning" style="position: relative;margin-top: -40px;float: right;"><i class="fa fa-star"></i> Review</a> -->

			<div class="col-sm-8">
				<div class="tab-content" style="padding-top: 20px;">
					<div role="tabpanel" class="tab-pane active" id="menu">
						<?php
						if(count($menu_data)>0)
						{
							echo '<div class="menu_item" >';
							foreach ($menu_data as $key => $value) {
								echo '<div class="row" menu-id="'.$value['id'].'">
								<div class="col-sm-2">
								<img src="'.$value['image'].'" class="img-responsive" style="border-radius:10px">
								</div>
								<div class="col-sm-8">
								<h4>'.$value['item'].' - $'.$value['price'].'</h4>
								<h5>'.$value['detail'].'</h5>
								</div>
								<div class="col-sm-2" restaurant-id="'.$value['restaurant_id'].'" menu-item-id="'.$value['id'].'" menu-item-item="'.$value['item'].'" menu-item-detail="'.$value['detail'].'" menu-item-price="'.$value['price'].'">
								<button class="btn btn-sm btn-info menu_item_edit"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-sm btn-danger menu_item_delete"><i class="fa fa-trash-o"></i></button>
								</div>
								</div>
								<hr>';
							}
							echo '</div>';
						}
						else
						{
							echo '<h2 class="no_menu_item">List your menu items here</h2>';
							echo '<div class="menu_item" ></div>';
						}

						?>
						<div class="row">
							<form class="form-horizontal" id="add_menu_item">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
									<div class="col-sm-9">
										<input type="text" name="item" class="form-control" placeholder="Item Name" required>
										<input type="hidden" name="restaurant_id" value="<?= $_GET['id']; ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Description</label>
									<div class="col-sm-9">
										<input type="text" name="detail" class="form-control" placeholder="Description" required>
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword3" class="col-sm-3 control-label">Price</label>
									<div class="col-sm-9">
										<input type="number" step="any" name="price" class="form-control" placeholder="Price" required>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
									<div class="col-sm-9">
										<input type="file" name="image" class="form-control" accept="image/*" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="menu_spinner" style="display:none"></i> Add menu item</button>
									</div>
								</div>
							</form>
						</div>
						<hr>
					</div>
					<div role="tabpanel" class="tab-pane" id="review">
						<?php

						if(count($reviews)>0)
						{
							foreach ($reviews as $key => $value) {
								echo '<div class="row">
								<div class="col-sm-8">
								<h5>'.date("F j, Y", strtotime($data['created_at'])).'</h5>
								<h4>'.$value['rating'].' Star by '.$value['first_name'].' '.$value['last_name'].'</h4>
								<p>'.$value['content'].'</p>
								</div>
								</div>
								<hr>';
							}
						}
						else
						{
							echo '<h4>No Reviews yet!</h4>';
						}


						?>


					</div>
				</div>
			</div>

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



<div class="modal edit-menu-item fade" role="dialog" aria-labelledby="register">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="register">Edit Menu Item</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="menu-item-edit">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
						<div class="col-sm-9">
							<input type="text" name="item" class="form-control" placeholder="Item Name" required>
							<input type="hidden" name="restaurant_id" value="<?= $_GET['id']; ?>">
							<input type="hidden" name="menu_id" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-9">
							<input type="text" name="detail" class="form-control" placeholder="Description" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-9">
							<input type="number" step="any" name="price" class="form-control" placeholder="Price" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
						<div class="col-sm-9">
							<input type="file" name="image" class="form-control" accept="image/*">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="menu-item-edit-spinner" style="display:none"></i> Update</button>
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