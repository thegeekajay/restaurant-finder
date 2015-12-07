<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Restaurant Finder</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse ">
				<ul class="nav navbar-nav  navbar-right">

					<?php

					if(!$session->session_exist('first_name'))
					{
						echo '<li>
						<form class="navbar-form navbar-right" id="login" action="user/login.php" method="POST">
						<div class="form-group">
						<input name="email" type="email" placeholder="Email" class="form-control" required>
						</div>
						<div class="form-group">
						<input name="password" type="password" placeholder="Password" class="form-control" required>
						</div>
						<button type="submit" class="btn btn-success btn-signin"><i class="fa fa-spinner fa-spin" id="signin_spinner" style="display:none"></i> Sign in</button>
						</form>
						</li>
						<li>
						<a class="btn btn-primary btn-custom" data-toggle="modal" data-target=".registration-form">Register</a>
						</li>';



					}
					else
					{
						if($session->get_session_data('user_type') == 'restaurant_owner')
						{
							echo '<li>
							<a class="btn btn-primary btn-custom" href="/dashboard.php" >Dashboard</a>
							</li>';
						}
						echo '<li>
						<a class="btn btn-danger btn-custom" href="./api/users/logout.php" >Logout</a>
						</li>';
						
					}



					?>
					

				</ul>

			</div><!--/.navbar-collapse -->
		</div>
	</nav>