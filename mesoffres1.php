<?php
session_start();
if (isset($_SESSION['nom'])) {
$password=$_SESSION['password'];
$nom=$_SESSION['nom'];
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
  <title>Offres</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <style type="text/css">

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
  <img src="photos/logo.png" width="50" class=" pr-3">
  <a class="navbar-brand" href="#" style="color: #10C4BE;">ESCC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="accueilEntreprise.php">Accueil</a>
      </li>
      <li>
        <a class="nav-link" href="rechercheMultiCritere.php">Consulter les CVs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle pr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="CVayantPostuler.php">CVs ayant postulé pour moi</a>
          <a class="dropdown-item" href="creerOffre.php">Creer une offre de stage</a>
           <a class="dropdown-item" href="mesoffres1.php">Mes offres </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="deconnexionEntreprise.php">Deconnexion</a>
        </div>
	</li>
    </ul>
        <ul class="navbar-nav ml-auto">
   <span class="navbar-text pl-5 ml-5" style="color: #FDE400; text-align: right; display: inline-block;"> <?php echo $nom; ?> </span>
   </ul>
  </div>
</nav>

<div class="col-md-2 mt-2" style=" position: fixed; ">
  <img src="photos/ensaklogo.png" class="mt-5" style="width: 90%;"><br><br>
  <p style="text-align: justify;" class="col-sm-12"> L'École Nationale des Sciences Appliquées de Kénitra est une grande école d’ingénieurs marocaine créée en 2008 par un partenariat entre l'Université Ibn-Tofail et l’Institut national des sciences appliquées de Lyon.</p>
</div>
<h3 class="pt-5 mt-5 ml-5" style="text-align: center;">Mes offres</h3>
<section class="col-md-12 row">
<div class="col-md-2"></div>
<div class="col-md-10 row d-flex justify-content-center p-4">
<?php
include("connexion.php");
$sql="SELECT code from entreprise where password='".$password."'";
$r=mysqli_query($link,$sql);
$d=mysqli_fetch_assoc($r);
$code=$d['code'];
$sql1="SELECT id6,intitule,type from offre where code='".$code."'";
$r1=mysqli_query($link,$sql1);
if(mysqli_num_rows($r1)==0){
 echo'<img src="photos/recherche.gif" style="height: 500px; width: 700px;" class="mb-5 pb-5"><h4 class="col-md-8 offset-md-2 mb-5">Vous n\'avez crée  aucune offre</h4> ';
 }
else 
  {while($d1=mysqli_fetch_assoc($r1))
{$c=$d1['id6'];
    $_SESSION['id6']=$c ;
  
?>

<div class="card m-3" style="width: 10rem;">
  <img src="photos/offre.jpg" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?php echo $d1['intitule'];   ?></h5>
    <p class="card-text"><?php echo $d1['type']; ?></p>
    <form action="afficher_offre.php" method="post"><button type="submit" name="apo" class="btn btn-dark" value=<?php 
    echo  $_SESSION['id6']?> >Voir Offre</button></form>
  </div>
</div>

<?php
}}
?>
</div>
</section>
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
      <h5 style="color: #E9E2E2;">Contact</h5><br>
<ul class="list-unstyled  social  ">
        
        <li class="list-inline-item"><a href="https://www.facebook.com/ESCC-231885027725519/"><i class="fa fa-facebook"></i></a></li>
        <li class="list-inline-item"><a href="https://twitter.com/ESCC70659386"><i class="fa fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="https://www.instagram.com/escc_plateforme/?hl=fr"><i class="fa fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="mailto:escc2019@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a></li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4  text-md-right ">
      <p style="color: #E9E2E2;">© ESCC PLATEFORM 2019. </p>
      
    </div>
  </div>
  </div>
</footer>
<?php } else header('location: broken.php'); ?>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>