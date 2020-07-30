<?php 

session_start();
ob_start();

if (isset($_SESSION['uname'])) {
	unset($_SESSION['uname']);
	header('refresh:3, url=index.php');
}elseif (isset($_SESSION['admin'])) {
	unset($_SESSION['admin']);
	header('refresh:3, url=index.php');
}else{
	header("location:index.php");
}

session_destroy();

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



	<style type="text/css">
	.loader {
    border: 5px solid #0B172A; /* Light grey */
   
    border-right: 5px solid white;
    border-left: 5px solid white; /* Blue */
    border-radius: 50%;
    width: 90px;
    height: 90px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

</head>
<body style="color:#777777;font-family:verdana;">
<?php
echo "<center><div class=\"loader\" style='margin-top:20%;'></div>Signing Out...</center>";
?>

</body>
</html>
