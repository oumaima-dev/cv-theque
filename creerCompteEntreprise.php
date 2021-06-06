<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Compte entreprise</title>
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



<h4 class="pt-5 mt-5 ml-3" style="text-align: center;">Créer un compte pour une entreprise </h4><br>
<form method="POST" action="" class="pt-5 container card " style="width: 500px;">
  <div class="form-group row ">
  	<label class="col-md-2" style="font-weight: bold;">Nom :</label>
    <input type="text" class="form-control col-md-8" name="nom"  required="">
  </div>
 <div class="d-flex flex-row justify-content-end"><button  type="submit" name="creer" class="btn btn-dark  mb-3">Créer</button></div>

</form>	



</body>
</html>
<?php 
include ("connexion.php");
if (isset($_POST['creer'])) {

	$nom=$_POST["nom"];
	$sql="INSERT INTO `entreprise`(`nom`) VALUES ('$nom')";
	$r=mysqli_query($link,$sql);
	$sql0="SELECT `code` FROM `entreprise` WHERE `nom`='$nom' ";
	$r0=mysqli_query($link,$sql0);	
	$r1=mysqli_fetch_assoc($r0); 
	$code=$r1['code'];
	$password=($code*7).$nom; 
	$sql2="UPDATE `entreprise` SET `password`='$password' WHERE `code`='$code';";
	$r2=mysqli_query($link,$sql2);

}
 ?>