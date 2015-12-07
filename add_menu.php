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
			<div class="col-sm-8">
				<h1>The Cuban Restaurant and Bar</h1>
				<div class="col-sm-4">
					<img src="http://s3-media4.fl.yelpcdn.com/bphoto/M0G7F5JHEzkElBXOs1MXZA/ls.jpg" class="img-responsive">
				</div>
				<div class="col-sm-8">
					<h4>4.0 star rating 520 reviews</h4>
					<h5>Time 10:00 am - 10:00 pm</h5>
					<br>
					<h4>333 Washington St</h4>
					<h4>Hoboken, NJ 07030</h4>
					<h4>(201) 795-9899</h4>
				</div>
			</div>
			<div class="col-sm-4">
				<img src="assets/images/maps.jpg" class="img-responsive" width="250px" style="border:10px solid rgba(103, 103, 103, 0.07)">
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
						<div class="row">
							<div class="col-sm-2">
								<img src="http://s3-media2.fl.yelpcdn.com/bphoto/_QHr5lj_VbwBY54g7Kuhmg/180s.jpg" class="img-responsive" style="border-radius:10px">
							</div>
							<div class="col-sm-8">
								<h4>Ceviche de Camarones - $9</h4>
								<h5>Lime, cilantro, onion and marinated shrimp served with plantain chips</h5>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-2">
								<img src="http://s3-media1.fl.yelpcdn.com/bphoto/6JYxy_HZRDgmv02YxX6g8Q/180s.jpg" class="img-responsive" style="border-radius:10px">
							</div>
							<div class="col-sm-8">
								<h4>Papa Rellena - $3.5</h4>
								<h5>Mashed potato stuffed with ground meat and cooked crispy outside and soft inside</h5>
							</div>
						</div>
						<hr>
						<div class="row">
							<form class="form-horizontal" id="register_form">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Item Name</label>
									<div class="col-sm-9">
										<input type="text" name="first_name" class="form-control" placeholder="Item Name" required>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Description</label>
									<div class="col-sm-9">
										<input type="text" name="last_name" class="form-control" placeholder="Description" required>
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword3" class="col-sm-3 control-label">Price</label>
									<div class="col-sm-9">
										<input type="number" name="phone" class="form-control" placeholder="Price" required>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
									<div class="col-sm-9">
										<input type="file" name="email" class="form-control" placeholder="Email" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-default"><i class="fa fa-spinner fa-spin" id="register_spinner" style="display:none"></i> Add menu item</button>
									</div>
								</div>
							</form>
						</div>
						<hr>
					</div>
					<div role="tabpanel" class="tab-pane" id="review">
						<div class="row">
							<div class="col-sm-8">
								<h5>NOV 30, 2015</h5>
								<h4>4 Star by John Doe</h4>
								<p>The order was supposed to be delivered in 50 minutes--which I thought is in itself quite long, given the distance. I had to call to hurry them up; they were courteous and immediately tracked down the delivery person, who in turn was polite and apologetic. But the food had gone cold and limp by then. Spring rolls were not crispy, and the honey chilli potato soggy and somewhat tasteless. I had not expected the potato to be so dry, but I understand different restaurants have their own recipes. Overall I think, Yo!China needs to step up its delivery service; it's quite different from the in-restaurant experience.</p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-8">
								<h5>NOV 28, 2015</h5>
								<h4>5 Star by Steven Welch</h4>
								<p>Good food liked the packing quality. Spoon and fork quality is not good enough for home delivery.</p>
							</div>
						</div>
						<hr>


					</div>
				</div>
			</div>
			<!-- <div class="col-sm-4" style="">
				<h3>Your order</h3>
				<div class="order">
					<div item-id="4" item-quantity="1" item-name="Tasajo Con Boniato" item-price="17">
						<div class="row">
							<div class="col-sm-2">
								<button class="btn btn-default quantity">2</button>
							</div>
							<div class="col-sm-10"><b>Tasajo Con Boniato</b></div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="btn-group" role="group" aria-label="...">
								  <button type="button" class="btn btn-default item-minus" item-id="4"><i class="fa fa-minus"></i></button>
								  <button type="button" class="btn btn-default item-add" item-id="4"><i class="fa fa-plus"></i></button>
								</div>
							</div>
							<div class="col-sm-8">
								<h3 class="price">$34</h3>
							</div>

						</div>
					</div>
					<hr>
					<h3>Total: $34</h3>
					<hr>
					<a href="checkout.php" class="btn btn-primary">Proceed to checkout</a>
				</div>
			</div> -->


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