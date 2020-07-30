<?php 
include("connect/db.php");

if (isset($_GET['candg'])) {
  header('location=christianandgospel.php');
}elseif (isset($_GET['apandf'])) {
  header('location=afropopandfusion.php');
}elseif (isset($_GET['afb'])) {
  header('location=afrobeat.php');
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

<script >
	// Select all links with hashes
$('a[href*="#"]')
// Remove links that don't actually link to anything
.not('[href="#"]')
.not('[href="#0"]')
.not('[href="#0"]')
.not('[href="#0"]')
.click(function(event) {
// On-page links
if (
location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
&& 
location.hostname == this.hostname
) {
// Figure out element to scroll to
var target = $(this.hash);
target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
// Does a scroll target exist?
if (target.length) {
// Only prevent default if animation is actually gonna happen
event.preventDefault();
$('html, body').animate({
scrollTop: target.offset().top
}, 1000, function() {
// Callback after animation
// Must change focus!
var $target = $(target);
$target.focus();
if ($target.is(":focus")) { // Checking if the target was focused
return false;
} else {
$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
$target.focus(); // Set focus again
};
});
}
}
});
</script>

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
  				<a style="color: white" class="navbar-brand" href="#"><img src="img/weblogo.png" alt="exmusic logo" width="50px" height="50px"></a> 
        </div>
        
  			<div class="collapse navbar-collapse" id="example-navbar-collapse">
  				 <ul class="nav navbar-nav" style="float: right;">
  				 	<div class="nav navbar-nav">
						<form class="navbar-form" action="search.php" method="GET">
							<div class="input-group">
							<input type="text" class="form-control" placeholder="Seacrh Music Here" name="k" value="<?php echo isset($_GET['k']) ? $_GET['k'] : ''; ?>">
								<span class="input-group-addon" ><i class="fa fa-search" type="submit"></i></span> 
          
							</div>
						</form>
					</div> 
  	 				<li><a id="top" href="#" style="color: white"><i class="glyphicon glyphicon-home "></i> HOME</a></li>
  	 				<li><a href="#two" style="color: white"><i class="glyphicon glyphicon-user"></i> ABOUT US</a></li>
  	 				<li><a href="#two" style="color: white"><i class="glyphicon glyphicon-phone"></i> CONTACT</a></li>
  	 				<li><a href="reglog.php" style="color: white"><i class="glyphicon glyphicon-log-in "></i> REGISTER | LOGIN </a></li>

  	 			</ul> 
  	 		</div> 
  	</nav>

  	<div class="container">
  		<div class="jumbotron" style="height:500px;background-image: url(img/exmu.png); background-size: cover; background-position:center; width:100%; padding-top:100px;"> 
  			<center>
  			<h1 style="color:white; font-size:50px;">Welcome to Explode Music!</h1>
  			<p class="mot">Your number one music plug.</p>
  			</center>
  			
  		</div>
  	</div>
  	<br>
  	<div class="container">
  			<h4 align="center" style="color:white;font-weight:12px;"> Genres</h4>
  		<div class="row">
  		  <div class="col-md-12" style="background:">
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a  href="genreloc/afropopandfusion.php" type="submit" name="apandf" style="text-decoration: none;color:#0B172A">Afropop <br>& <br>Afro Fusion</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="genreloc/afrobeat.php" type="submit" name="afb" style="text-decoration: none;color:#0B172A">Afro Beats</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="genreloc/christianandgospel.php" type="submit" name="candg" style="text-decoration: none;color:#0B172A">Christian <br>& <br>Gospel</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Hip-Hop <br>& <br>Rap</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">RnB <br>& <br>Soul</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Country</a>
          </div>  
        </div>
  		</div>

      
      <div class="row">
        <div class="col-md-12" style="background:">
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Raggae</a>
          </div>
          <div class="col-md-2 " style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Jazz</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Rock</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Fuji</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Highlife</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Juju</a>
          </div>  
        </div>
      </div>

       <div class="row">
        <div class="col-md-12" style="background:">
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Traditional</a>
          </div>
          <div class="col-md-2 " style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Nanaye <br>(Rauji)</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Islamic</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">World Music</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">Hausa Music</a>
          </div>
          <div class="col-md-2" style="border:3px solid #0B172A;height:200px;background: #EEEEEE; font-size: 25px;">
            <a href="#" style="text-decoration: none;color:#0B172A">POP</a>
          </div>  
        </div>
      </div>


  	</div>
  		

  	<br>
  	<div class="container">
  		<h4 align="center" style="color:white;font-weight:12px;">Top Songs</h4>
  		<div class="row">
  			<table class="table table-bordered" style="color:white">
  				<tr>
  					<thead>
  						<th>Artist</th>
  						<th>Song</th>
  					</thead>
  				</tr>
  				<tr>
  					<tbody>
  						<td>Nathaniel Bassey</td>
  						<td>You are God</td>
  					</tbody>
  				</tr>
  				<tr>
  					<tbody>
  						<td>Ada</td>
  						<td>Jesus</td>
  					</tbody>
  				</tr>
  				<tr>
  					<tbody>
  						<td>Zlatan</td>
  						<td>Have Give my life to Jesus</td>
  					</tbody>
  				</tr>
  			</table>
  		</div>
  	</div>
  	





  	<footer style="background: white;padding:20px;text-align: center;color:#0B172A;">
     
        
    <div class="container" style="color:#0B172A;border:1px solid white;height:auto" id="two">
      <div class="row">
        <div class="col-md-6">
          <h3 align="left"> About Us</h4>
            <article align="left">
              <p>
                Explode Music <br> Is where You can download all <br>
                kind of Music And Also Upload <br> Your Own Music as
                An Artist.
              </p>
            </article>
        </div>
        <div class="col-md-6">
          <h3 align="left">Contact</h4>
          <article align="left">
              <p>
                For sponsorship/inquiires, take down the information.
              </p>
              <p><strong>Phone:</strong> 081-775-077-80</p>
              <p><strong>Instagram:</strong>@Mc_narth</p>
              <p><strong>Twitter:</strong>@Nathaniel_nosa</p>
              <p><strong>Facebook:</strong>Nathaniel Nosa</p>
              <p><strong>Email:</strong>nathanielnarth@gmail.com</p>
            </article>
        </div>
      </div>
    </div>
      <hr>
  		copyright &copy 2020 Explode Music
  	</footer>

  </body>
  </html>