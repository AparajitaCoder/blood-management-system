<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
{
	$email=$_POST['username'];
	$password=md5($_POST['password']);
	$sql ="SELECT id,EmailId,Password FROM tblblooddonars WHERE EmailId=:email and Password=:password";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);

	if($query->rowCount() > 0)
	{
		$_SESSION['ulogin']=$_POST['username'];
		$_SESSION['uid']=$results[0]->id;
		echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
	} else{
	  echo "<script>alert('Invalid Details');</script>";
	}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BMS | Admin Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/banner2.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Blood Bank System Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">
									 <div class="form-group">
									    <label for="exampleInputEmail1">Username</label>
									    <input type="text" class="form-control"  name="username"  placeholder="Username">									    
									  </div>
									   <div class="form-group">
										    <label for="exampleInputPassword1">Password</label>
										    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
										</div>

										<button type="submit" name="login" class="btn btn-primary btn-md">Login</button>

								

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>