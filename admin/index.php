<?php 
session_start();
include("../connect/db.php");

  if (!isset($_SESSION['admin'])) {
    echo "<script>alert('You must first login!'); window.location = '../reglog.php'</script>";
// }else{

//   $query =  "SELECT * FROM admin WHERE admin ='".$_SESSION['uname']."'";

//   $result = mysqli_query($conn, $query);

//   while ($uimg = mysqli_fetch_assoc($result)) {
  
//     $uimgg = "<img src = 'upload/".$uimg['photo']."'  class='img-circle' style='width:50px; height:50px'/>";
//   }

// }
}

$addsuc = '';
if (isset($_POST['admusic'])) {
	$genere = $_POST['genere'];
	$tmusic = $_POST['tmusic'];
	$artist = $_POST['artist'];


	// for imgae
	$arimg = $_FILES['aimg']['name'];
	$temp = $_FILES['aimg']['tmp_name'];
	$addloc = '../artistimgae/'.$arimg;

	move_uploaded_file($temp, $addloc);

	// for music
	$amusic = $_FILES['amusic']['name'];
		if ($_FILES['amusic']['type'] =='audio/mpeg' || $_FILES['amusic']['type'] =='audio/mpeg3' || $_FILES['amusic']['type'] =='audio/x-mpeg3' || $_FILES['amusic']['type'] =='audio/mp3' || $_FILES['amusic']['type'] =='audio/x-wav' || $_FILES['amusic']['type'] =='audio/wav')
			{
				$mtemp = $_FILES['amusic']['tmp_name'];
				$mloc = '../artistmusic/'.$amusic;
				move_uploaded_file($mtemp, $mloc);
			}

			$addqu = "INSERT INTO addmusic (genere, tmusic, artist, aimg, amusic) VALUES('$genere', '$tmusic', '$artist', '$arimg', '$amusic')";
			$addre = mysqli_query($conn, $addqu);
			$addsuc ="<i class='glyphicon glyphicon-ok-sign'> <strong> Music Added SUCCESSFUL </strong></i>";
				header('refresh:1, url=index.php');

}

$getmu = "SELECT * FROM addmusic";
$getre = mysqli_query($conn, $getmu);
$getf = mysqli_fetch_all($getre, MYSQLI_ASSOC);


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
           <ul class="nav navbar-nav" style="float: right">
            <div class="nav navbar-nav" style="float:left">
            <form class="navbar-form" action="#" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Seacrh Music Here">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
              </div>
            </form>
          </div>
           <div class="nav navbar-nav" style="float: right;">
            <li> <a href="../logout.php"style="color: white; width:150px" class="btn btn-danger">LOGOUT</a></li>
          </div> 

          </ul> 
        </div> 

  	 			</ul> 
  	 		</div> 
  	</nav>

  	<!-- <div style="width: 150px; height: 150px; border:1px solid white; border-radius:90px">
  					<center><i class="fa fa-music" style="color:#29C44D;font-size: 60px;margin-top:20px"></i><p style="color: white">Add Music</p></center>
  				</div>
 -->
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">
  				
  				<!-- Add music -->
  				<div class="col-md-3">
  					<form class="form" action="#" method="POST" enctype="multipart/form-data" style="color:white">
  						<div class="form-group">
  							Genres
  							<select name="genere" class="form-control" style="overflow: auto">
  								<option>-----</option>
  								<option>Afropop & Afro Fusion</option>
  								<option>Afro Beats</option>
  								<option>Christian & Gospel</option>
  								<option>Hip-Hop & Rap</option>
  								<option>RnB & Soul</option>
  								<option>Country</option>
  								<option>Raggae</option>
  								<option>Jazz</option>
  								<option>Rock</option>
  								<option>Fuji</option>
  								<option>Highlife</option>
  								<option>Juju</option>
  								<option>Traditional</option>
  								<option>Nanaye</option>
  								<option>Islamic</option>
  								<option>World Music</option>
  								<option>Hausa</option>
  								<option>POP</option>
  							</select>
  						</div>
  						<div class="form-group">
  							Music Title
  							<input type="text" name="tmusic" placeholder="Title of Music" class="form-control" required>
  						</div>
  							Artist Name
  						<div class="form-group">
  							<input type="text" name="artist" placeholder="Artist Name" class="form-control" required>
  						</div>
  							Artist Image
  						<div class="form-group">
  							<input type="file" name="aimg" placeholder="Artist Image" class="form-control" required>
  						</div>
  							Select Music (Mp3, wav, mpeg3, mpng, x-mpeg3)
  						<div class="form-group">
  							<input type="file" name="amusic" placeholder="Music" class="form-control" required>
  						</div>
  						<p><?php echo $addsuc; ?></p>
  						<div class="form-group">
  							<input type="submit" name="admusic" value="Add Music" class="form-control btn btn-success">
  						</div>
  						
  					</form>
  				</div>

  				<!-- View music -->
  				<div class="col-md-9">
  					<h3 align="center" style="color: white">List Of Music</h3>
  					<div style="color: white;height:23em;overflow-y: scroll;overflow-x: hidden;">
  						<table class="table table-bordered">
  						<div class="table-header-class">
  							<tr>
  							<thead>
  								<th>Name of Artist</th>
  								<th>Name of Music</th>
  								<th>Genres</th>
  								<th>Date Created</th>
  								<th>Action</th>
  							</thead>
  						</tr>
  						</div>
  						<div class="table-body-class" >
  							
  						<?php foreach ($getf as $getfs)  : ?>
  						<tr>
  							<tbody>
  								
  								<td><?php echo $getfs['artist'] ; ?></td>
  								<td><?php echo $getfs['tmusic'] ; ?></td>
  								<td><?php echo $getfs['genere'] ; ?></td>
  								<td><?php echo $getfs['created_at'] ; ?></td>
  								<td>
  									<a href="delete.php?id=<?php echo $getfs['id']?>" class="btn btn-danger">Delete</a>
  									<a href="update.php?id=<?php echo $getfs['id']?>" class="btn btn-success">Update</a>
  								</td>
  								  								
  							</tbody>
  						</tr>
  						<?php endforeach ?>
  						</div>
  					</table>
  					
  					</div>
  					
  				</div>
  				
  			</div>
  		</div>
  	</div>

 

 </body>
 </html>