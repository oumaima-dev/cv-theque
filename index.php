<?php session_start();
 
if(isset($_POST['connexion'])){

$log=$_POST['login'];
$pas=$_POST['pass'];
$b=$_POST['customRadio'];

include("connexion.php");

 if($b=='et'){
    $requete1="SELECT prenom,apogee from etudiant where prenom='$log' and apogee='$pas'";
    $h=mysqli_query($link,$requete1);
    $r=mysqli_fetch_assoc($h);
     if($r!=FALSE)
       {
        $_SESSION['prenom']=$log;
        $_SESSION['apogee']=$pas;?>
        <script >
        window.location.href="accueilEtudiant.php";
      </script>
   <?php } else {
       $eroret="  veuillez saisir votre prénom en login et votre numéro d'apogée en password" ;
     }}

if($b=='en'){
    $requete2="SELECT nom,password,code from entreprise where nom='$log'and password='$pas'";
    $h2=mysqli_query($link,$requete2);
    $r2=mysqli_fetch_assoc($h2);
    if($r2!=FALSE){
        $_SESSION['nom']=$log;
        $_SESSION['password']=$pas;
        $_SESSION['code']=$r2['code'];?>
        <script >
        window.location.href="accueilEntreprise.php";
      </script>
      <?php }
         else {
       $eroren="veuillez saisir un login et password correct ";}}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Accueil</title>
</head>
<body >
	<style type="text/css">
		.carousel-item ,.carousel-item img{
			height: 600px;
		}

    .carousel-caption{color:white ;
  text-shadow: 2px 2px black;
  }

		
		#footer h5 ,p{color: #E9E2E2;}
		#footer a {
    color: #ffffff;
    text-decoration: none ;
    background-color: transparent;
   
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a{color: #A4A4A4;}
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#A4A4A4;
}
#footer ul.quick-links li{
	padding: 3px 0;

	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

	</style>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <img src="photos/logo.png" width="60" class=" pr-4">
  <a class="navbar-brand" href="#" style="color: #10C4BE;">ESCC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto mr-3">
		<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" >
  Connexion
		</button>

    </ul>
  </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="POST" action="#">
	<div class="custom-control custom-radio">
  <input type="radio" id="customRadio1" name="customRadio" value="et" class="custom-control-input" checked>
  <label class="custom-control-label" for="customRadio1" >Etudiant</label>
</div>
<div class="custom-control custom-radio">
  <input type="radio" id="customRadio2" name="customRadio" value="en" class="custom-control-input">
  <label class="custom-control-label" for="customRadio2" >Entreprise</label>
</div> <br>
  <div class="form-group">
    <input type="text" class="form-control" name="login" placeholder="Login" required="required">
  </div>
  <div class="form-group">
    <input type="password" class="form-control"  name="pass" placeholder="Password" required="required">
    <div style="color: red; font-size: 14px;" class="pl-1"><?php 
      	 if (isset($_POST['connexion'])) { if(isset($eroret)) echo $eroret ."<br>"; else if(isset($eroren)) echo $eroren;}
      
      	 ?></div>
  </div> 

      </div>
      <div class="modal-footer">
      	<button type="submit" name="connexion" class="btn btn-dark">S'identifier</button>
      </div>
   </form>   
    </div>
  </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="photos/8.jpg"  class="d-block w-100 h-80" >
      <div class="carousel-caption d-none d-md-block">
      <h3>Connectez-vous à votre compte entreprise ou étudiant</h3>    
    </div>
    </div>
    <div class="carousel-item ">
      <img src="photos/7.jpg"  class="d-block w-100 h-80" >
          <div class="carousel-caption d-none d-md-block">
      <h3>Créez et modifiez des CVs ou des offres de stages chez nous</h3>    
    </div>
    </div>
    <div class="carousel-item">
      <img src="photos/1.jpg"  class="d-block w-100 h-80" >
      <div class="carousel-caption d-none d-md-block">
      <h3>Cherchez et postulez aux offres qui vous intéressent</h3>    
    </div>
    </div>

<div class="carousel-item">
      <img src="photos/3.jpg"  class="d-block w-100 h-80" >
      <div class="carousel-caption d-none d-md-block">
      <h3>Faites une sélection multicritère pour faciliter la consultation des CVs </h3>    
    </div>
    </div>    

    <div class="carousel-item">
      <img src="photos/6.jpg"  class="d-block w-100 h-80" >
        <div class="carousel-caption d-none d-md-block">
      <h3>ESCC vous connecte</h3>    
    </div>
    </div> 
     
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<footer style="background-color: #232121; " id="footer" class="pt-3 pb-2 w-100 h-20 d-inline-block" >
	<div class="container">
		<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4  ">
					<ul class="list-unstyled quick-links">
						<li><a href="about.php"><i class="fa fa-angle-double-right"></i>à propos</a></li>
						<li><a href="ensakenitra.php"><i class="fa fa-angle-double-right"></i>Ensa Kenitra</a></li>
						<li><a href="entreprises.php"><i class="fa fa-angle-double-right"></i>Entreprises</a></li>
					</ul>
				</div>	
		
		<div class="col-xs-12 col-sm-4 col-md-4 text-md-center">
			<h5>Contact</h5><br>
			<ul class="list-unstyled  social  ">
        
        <li class="list-inline-item"><a href="https://www.facebook.com/ESCC-231885027725519/"><i class="fa fa-facebook"></i></a></li>
        <li class="list-inline-item"><a href="https://twitter.com/ESCC70659386"><i class="fa fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="https://www.instagram.com/escc_plateforme/?hl=fr"><i class="fa fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="mailto:escc2019@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a></li>
      </ul>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4  text-md-right ">
			<p>© ESCC PLATEFORM 2019. </p>
			
		</div>
	</div>
	</div>
</footer>

<script src="js/bootstrap"></script>
<script src="js/bootstrap.min"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>