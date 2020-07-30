<?php 

$conn = mysqli_connect('localhost', 'root', '', 'exmusic');

$afbque = "SELECT * FROM addmusic WHERE genere = 'Afropop & Afro Fusion' ";
$afbre =  mysqli_query($conn, $afbque);
$afbs = mysqli_fetch_all($afbre, MYSQLI_ASSOC);

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
 <body style="color: white">

 	<div class="container">
 		<div class="row">
 			<div class="col-md-12">
 				<h4><b>Artist</b></h4>
 				<table>
 					<tr>
 				<?php foreach ($afbs as $afbb) { ?>
 							<tb>
 								<?php echo  "<a href=''><img class='img-circle' src = '../artistimgae/".$afbb['aimg']."' style='width:80px; height:80px'/></a>"; ?>
 							</tb>
 						</tbody>

 				<?php } ?>
 			</tr>
 				</table>
 			</div>
 		</div>

 		<div class="row">
 			<div class="col-md-1"></div>
 			<div class="col-md-10">
 				<h4 align="center"><b>Musics</b></h4>
 				<table class="table table-bordered">
 					<tr>
 						<thead>
 							<th>Image</th>
 							<th>Genres</th>
 							<th>Artist</th>
 							<th>Title</th>
 							<th>Listen/Download</th>
 						</thead>
 					</tr>
 					<?php foreach ($afbs as $afbb) : ?>
 						<tr>
 							
 							<td><?php echo "<img src = '../artistimgae/".$afbb['aimg']."' style='width:80px; height:70px'/>"; ?></td>
 							<td><?php  echo $afbb['genere']?></td>
 							<td><?php  echo $afbb['artist']?></td>
 							<td><?php  echo $afbb['tmusic']?></td>
 							<td><?php echo "<audio controls='controls'>
									<source src='../artistmusic/".$afbb['amusic']."' type ='audio/mpeg'> 
									</audio>"; ?>
										
									</td>
 						</tr>
 					<?php endforeach ?>
 				</table>
 			</div>
 			<div class="col-md-1"></div>
 		</div>
 	</div>
 </body>
 </html>