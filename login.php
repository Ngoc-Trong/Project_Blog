
<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>
<?php  include "admin/function.php" ?>


<?php

		//checkIfUserIsLoggedInAndRedirect('/cms/admin');


		if(ifItIsMethod('post')){
			
			if(isset($_POST['username']) && isset($_POST['password'])){
				$_SESSION['username']= $_POST['username'];
    			$_SESSION['password']= $_POST['password'];
    			//$_SESSION['user_role']= null;

				login_user($_POST['username'], $_POST['password']);


			}else {

				echo $_POST['username'];
				redirect('/cms/login.php');
			}

		}
		// if(isset($_POST['login'])){
		// 	login_user( $_POST['username'],$_POST['password']);
		// }






?>



<!-- Navigation -->

<?php  include "include/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Login</h2>
							<div class="panel-body">


								<form action="/cms/include/login.php" id="login-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="username" type="text" class="form-control" placeholder="Enter Username">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password">
										</div>
									</div>

									<div class="form-group">

										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>


								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "include/footer.php";?>

</div> <!-- /.container -->
