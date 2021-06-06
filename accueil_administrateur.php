<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Administration du site</title>
</head>
<body >
	<style type="text/css">
		h5{font-weight: bold;}
    h3{color:#FAAC58; font-weight: bold;}
		tbody button{background-color: white;}
		tbody a{color: black;}

	</style>
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
<h3 class="pt-5">Administration du site</h3>
<table class="table mt-5" >
  <thead>
    <tr style="background-color: #2E2E2E;color: white;">
    	<td colspan="4"><h4>Espace étudiant et entreprise</h4></td>
    </tr>
  </thead>
  <tbody>
    <tr>
    	<td colspan="2"><h5>Etudiant</h5> </td>
    	<td class="text-right"><button type="button" class="btn btn-outline btn-sm">
          <a href="creerCompteEtudiant.php"><span class="glyphicon glyphicon-plus">Ajouter</span></a> 
        </button>
    	<button type="button" class="btn btn-outline btn-sm">
          <a href="afficherEtudiant.php"><span class="glyphicon glyphicon-th-list">Afficher</span> </a>
        </button></td>
    </tr>
    <tr>
    	<td colspan="2"><h5>Entreprise</h5> </td>
    	<td class="text-right"><button type="button" class="btn btn-outline btn-sm">
          <a href="creerCompteEntreprise.php"><span class="glyphicon glyphicon-plus">Ajouter</span> </a>
        </button>
    	<button type="button" class="btn btn-outline btn-sm">
          <a href="afficherEntreprise.php"><span class="glyphicon glyphicon-th-list">Afficher</span> </a>
        </button></td>
    </tr>  
    <tr style="background-color: #2E2E2E;color: white;">
    	<td colspan="4"><h4>Offres des entreprise</h4></td>
    </tr>    
    <tr>
    	<td colspan="2"><h5>Offres</h5> </td>
    	<td class="text-right"><button type="button" class="btn btn-outline btn-sm">
          <a href="listeoffreAdmin.php"><span class="glyphicon glyphicon-th-list">Afficher</span></a> 
        </button></td>
    </tr>      

  </tbody>
</table>
</div>




<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>