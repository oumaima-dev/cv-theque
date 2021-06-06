<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Compte etudiant</title>
</head>
<body >
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <img src="photos/logo.png" width="60" class=" pr-4">
  <a class="navbar-brand" href="#" style="color: #10C4BE;">ESCC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="ml-auto mr-4">
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li>
         <a class="nav-link pr-5" href="accueil_administrateur.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-auto" href="deconnexion_admin.php">Déconnexion</a>
      </li>
    </ul>
  </div></div>
</nav>

<h4 class="pt-5 mt-5 ml-3" style="text-align: center;">Créer un compte pour un étudiant </h4><br>
<form method="POST" action="" class="pt-5 card container " style="width: 500px;">
  <div class="form-group col-md-8 ml-5">
    <input type="number" class="form-control" name="apogee" placeholder="Numéro apogee" required="required">
  </div>
  <div class="form-group col-md-8 ml-5">
    <input type="text" class="form-control" name="nom" placeholder="Nom" required="required">
  </div>
  <div class="form-group col-md-8 ml-5">
    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required="required">
  </div>
  <div class="form-group col-md-8 ml-5">
    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
  </div>  
  <div class="d-flex flex-row justify-content-end"><button  type="submit" name="creer" class="btn btn-dark  mb-3">Créer</button></div>
</form>	




<?php
include("connexion.php");
if (isset($_POST['creer'])) {

$a=$_POST['prenom'];
$b=$_POST['nom'];
$c=$_POST['apogee'];
$d=$_POST['email'];
$requete2="INSERT INTO `etudiant`(`apogee`, `nom`, `prenom`, `email`) VALUES ('$c','$b','$a','$d')";
$e=mysqli_query($link,$requete2);


}
?>
	

</body>
</html>