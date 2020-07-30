<?php 
session_start();
include("../connect/db.php");

  if (!isset($_SESSION['admin'])) {
    echo "<script>alert('You must first login!'); window.location = '../reglog.php'</script>";

}

//

if ($_GET['id']) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $upqu = "SELECT * FROM addmusic WHERE id='$id' ";
  $upre = mysqli_query($conn, $upqu);
  $getups = mysqli_fetch_all($upre, MYSQLI_ASSOC);

  mysqli_free_result($upre);

}

$succ = $ntsucc = "";
if (isset($_POST['delete'])) {
	$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

	$query =  "DELETE FROM addmusic WHERE id='$id_to_delete'";
	if(mysqli_query($conn, $query)){
		$succ = "Product Deleted Successfully !";
			header('refresh:1, url=index.php');
	}else{
		$ntsucc = "Check, There is a problem somewhere!";
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
 		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../font4.7/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="../maincss/css.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/jquery.innerfade.js"></script>




 </head>
 <body>
 	<nav class="navbar navbar-default navbar-static-top navbar-light bg-light" role="navigation" style="background:transparent;height:80px;border:none;">
		 <div class="navbar-header">
 			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse"> 
  				<span class="sr-only">Toggle navigation</span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  				<span class="icon-bar"></span>
  			</button> 
  				<a style="color: white" class="navbar-brand" href="#"><i class="fa fa-user-circle" style="color:white; font-size:40px">
  					<?php echo strtoupper($_SESSION['admin']); ?>
  				</i>

  				 </div>

  			<div class="collapse navbar-collapse" id="example-navbar-collapse">
  				 <ul class="nav navbar-nav" style="float: right; width:900px; border:1px transparent" >
  				 	<div class="nav navbar-nav" style="">
						<form class="navbar-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Seacrh Music Here" style="width:300px;">
								<span class="input-group-addon"><i class="fa fa-search"></i></span>
							</div>
						</form>
					</div>
					<div class="nav navbar-nav" style="">
						<li> <a href="../logout.php"style="color: white; width:200px" class="btn btn-danger">LOGOUT</a></li>
					</div>

  	 			</ul> 
  	 		</div> 
  	</nav>

  	<!-- <div style="width: 150px; height: 150px; border:1px solid white; border-radius:90px">
  					<center><i class="fa fa-music" style="color:#29C44D;font-size: 60px;margin-top:20px"></i><p style="color: white">Add Music</p></center>
  				</div>
 -->
 

    <!-- for update -->

    <div class="container" id="two">
      <div class="row">
        <div class="col-md-12">
         
        <div class="col-md-1"></div>
          <!-- View music -->
          <div class="col-md-10" style="color: white" >
            <h3 align="center" style="color: white">Delete Music</h3>
              <table class="table table-bordered">
              <div class="table-header-class">
                <tr>
                <thead>
                  <th>Name of Artist</th>
                  <th>Name of Music</th>
                  <th>Genres</th>
                  <th>Date Created</th>
                  <th>#</th>
                </thead>
              </tr>
              </div>
              <div class="table-body-class" >
                
              <?php foreach ($getups as $getup)  : ?>
              <tr>
                <tbody>
                  
                  <td><?php echo $getup['artist'] ; ?></td>
                  <td><?php echo $getup['tmusic'] ; ?></td>
                  <td><?php echo $getup['genere'] ; ?></td>
                  <td><?php echo $getup['created_at'] ; ?></td>
                  <td>
							<form action="#" method="POST" class="form">
							<input type="hidden" name="id_to_delete" value="<?php echo $getup['id'] ?>">
							<input type="submit" name="delete" value="Delete" class="btn btn-danger">
							</form>

						</td>
                      
                </tbody>
              </tr>
              <?php endforeach ?>
              </div>
            </table>
          
            
          </div>
          <!-- ..... -->
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>

 

 </body>
 </html>