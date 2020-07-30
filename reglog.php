<?php
session_start();
include("connect/db.php");

$regsuc="";
$notsucc ="";
$suca = $sucu ="";


if (isset($_POST['reg'])) {

$fname = $_POST['fname'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$pnum = $_POST['pnum'];
$picname = $_FILES['ppic']['name'];
$tempname = $_FILES['ppic']['tmp_name'];
$loc = 'userspics/'.$picname;
move_uploaded_file($tempname,$loc);

	
	$query = "INSERT INTO register (fname, email, uname, pwd, pnum, ppic) VALUES('$fname', '$email','$uname','$pwd','$pnum','$picname')";
	$req = mysqli_query($conn, $query);

	$regsuc ="<i class='glyphicon glyphicon-ok-sign'> <strong> REGISTRATION SUCCESSFUL </strong></i>";
	header('refresh:1, url=reglog.php');
	// query for login
	

}elseif (isset($_POST['click'])) {
	// echo "What sup";

	$qu = mysqli_query($conn, "SELECT * FROM register WHERE email='".$_POST['uname']."' || uname='".$_POST['uname']."' && pwd='".$_POST['pwd']."' ");

	$qa = mysqli_query($conn, "SELECT * FROM admin WHERE admin='".$_POST['uname']."' && admin_pwd='".$_POST['pwd']."'");


	if (mysqli_num_rows($qa)>0) {
		$_SESSION['admin'] = $_POST['uname'];
		$suca ="<strong>ADMIN LOGIN <i class='glyphicon glyphicon-ok-sign'></i> </strong>";
		header('location:admin/index.php');

	}elseif (mysqli_num_rows($qu)>0) {
		$_SESSION['uname'] = $_POST['uname'];
		$sucu ="<strong>LOGIN DETAILS NOT CORRECT <i class='glyphicon glyphicon-ok-sign'></i> </strong>";
		header('location:userspage.php');
	}else{
		$notsucc ="<i class='glyphicon glyphicon-remove-circle'><strong>LOGIN DETAILS NOT CORRECT</strong></i>";
	}

}



?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Explode Music</title>
 		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=-1">
		<meta http-equiv="x-ua-compactible" content="ie-edge">
 		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="font4.7/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="maincss/css.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.innerfade.js"></script>

 </head>
 <body>

 	<div class="container" style="margin-top:25px;">
 		<div class="row">
 			<div class="col-md-2"></div>

 			<div class="col-md-8" style="background-image: url(img/exmutr.png); background-size: cover; background-position:center; border: 1px solid white">


 				<!-- for registration -->
 				<div class="col-md-6" style="float: left;color: white; border-right:3px dashed white">
 					<h3 align="center">Register</h3>
 					<center><i class="fa fa-users" style="font-size:60px;color:lightgreen" ></i></center> <br>
 					<form class="form" action="reglog.php" method="POST" enctype="multipart/form-data">
 						<div class="form-group">
 							<input type="text" name="fname" placeholder="Enter Full Name" class="form-control" required="">
 						</div>
 						<div class="form-group">
 							<input type="email" name="email" placeholder="Enter Email" class="form-control" required="">
 						</div>
 						<div class="form-group">
 							<input type="text" name="uname" placeholder="Enter Username" class="form-control" required="">
 						</div>
 						<div class="form-group">
 							<input type="Password" name="pwd" placeholder="Enter Password" class="form-control" required="">
 						</div>
 						<div class="form-group">
 							<input type="text" name="pnum" placeholder="Enter Phone Number" class="form-control" required="">
 						</div>
 						<div class="form-group">
 							<input type="file" name="ppic" placeholder="Select Profile Picture" class="form-control" required="">
 						</div>
 						<p><?php echo $regsuc; ?></p>
 						<div class="form-group">
 							<button type="submit" class="btn btn-success form-control" name="reg">REGISTER</button>
 						</div>
 					</form>

 				</div>
 			
 				<!-- for login -->
 				<div class="col-md-6" style="float: right;color: white;">
 					<h3 align="center">Login</h3>
 					<center><i class="fa fa-user-circle" style="font-size:60px; color:lightgreen" ></i></center> <br>

 					<form class="form" action="#" method="POST">
 						<div class="form-group">
 							<input type="text" name="uname" placeholder="Enter Username or Email" class="form-control" required>
 						</div>
 						<!-- <div class="form-group" hidden="">
 							<input type="email" name="email" placeholder="Enter Email" class="form-control" >
 						</div> -->
 						<div class="form-group">
 							<input type="password" name="pwd" placeholder="Enter Password" class="form-control" required>
 						</div>
 						<p><?php echo $notsucc; echo $suca; echo $sucu; ?></p>
 						<div class="form-group">
 							<button class="btn btn-success form-control" name="click" type="submit">LOGIN</button>
 						</div>
 						<div class="form-group">
 							<a href="#" style="color: white;"><i class="glyphicon glyphicon-question-sign"></i> Forget Password</a>
 						
 						</div>
 						
 					</form>
 					
 				</div>
 				
 			</div>
 			<div class="col-md-2"></div>
 		</div>

 		<div class="row">
 			<p></p>
 			<center><a href="index.php" style="color: white;"><i class="glyphicon glyphicon-home"></i> Back To Home Page!</a></center>
 		</div>
 	</div>

 
 </body>
 </html>