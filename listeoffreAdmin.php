<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>offres</title>
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


<div class="container mt-5">
  <h3 class="pt-5">La liste des offres </h3>
<?php
include("connexion.php");
$requete2="select intitule,nom,type from offre,entreprise where offre.code=entreprise.code ";
$b=mysqli_query($link,$requete2);
echo'<table class="table mt-5">
<tr><th>Entreprise</th>
    <th>Intitulé</th>
    <th>Type</th>
    </tr>';
while($d=mysqli_fetch_assoc($b))
{ echo"<tr><td>".$d['nom']."</td>
   <td>".$d['intitule']."  </td>
   <td>".$d['type']."</td>
   </tr>";
}
echo"</table>";

?>
</div>
</body>
</html>