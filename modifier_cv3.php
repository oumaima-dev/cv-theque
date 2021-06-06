<?php
include("connexion.php");
session_start();
if (isset($_SESSION['prenom'])) {
$apogee=$_SESSION['apogee'];
$prenom=$_SESSION['prenom'];

?><!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<title>CV</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<style type="text/css">
		strong{color: gray;}
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

  html{position: relative;
    min-height: 100%;}
  #footer{position: absolute;
  bottom: 0;}  

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
        <a class="nav-link" href="accueilEtudiant.php">Accueil</a>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle pr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cv.php">Mon CV</a>
          <a class="dropdown-item" href="mesOffres.php">Mes offres</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="deconnexion.php">Deconnexion</a>
        </div>
     </li>
   </ul>
   <ul class="navbar-nav ml-auto">
   <span class="navbar-text pl-5 ml-5" style="color: #FDE400; text-align: right; display: inline-block;"> Bonjour <?php echo $prenom; ?> </span>
   </ul>    
  </div>
</nav>


<h4 class="mt-5 pt-5 ml-5"style="color:#10C4BE;">Compétences</h4><br>
<div class="container mt-2">
	
		<form  action="trait_modifier_cv3.php" method="POST" class=" d-flex flex-row col-md-12">

			<div class="form-group  col-md-3">
        <strong><label style="color: #FFBF00;">Bureautique</label></strong>
        <div>
        <?php 
$requete1="select  distinct bureautique.b from avoir_compet1,etudiant,bureautique where avoir_compet1.apogee=$apogee and bureautique.id1=avoir_compet1.id1";
$r=mysqli_query($link,$requete1);$t='""';
while($d1=mysqli_fetch_assoc($r))
  {$t.=",'".$d1['b']."'";
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="bureau[]" value=<?php  echo $d1['b']; ?> id=<?php  echo $d1['b']; ?> checked>
  <label class="custom-control-label" for=<?php  echo $d1['b']; ?> ><?php  echo $d1['b']; ?> </label>
</div>
<?php } 

$requete1="select  b from bureautique where b not in(".$t.")";
$r=mysqli_query($link,$requete1);
while($d1=mysqli_fetch_assoc($r))
  {
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="bureau[]" value=<?php  echo $d1['b']; ?> id=<?php  echo $d1['b']; ?>>
  <label class="custom-control-label" for=<?php  echo $d1['b']; ?>><?php  echo $d1['b']; ?> </label>
</div>
<?php } ?>
</div></div>
      
			<div class="form-group col-md-3">
		
				<strong><label style="color: #FFBF00;">Langages Informatiques</label></strong>
  <div class="">
  <?php
include("connexion.php"); 
$requete1="select  distinct linfo from avoir_compet2,lang_info where apogee=$apogee and lang_info.id2=avoir_compet2.id2 ";
$r=mysqli_query($link,$requete1);$t='""';
while($d1=mysqli_fetch_assoc($r))
  {$t.=",'".$d1['linfo']."'";
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="info[]" value=<?php  echo $d1["linfo"]; ?> id=<?php  echo $d1['linfo']; ?> checked>
  <label class="custom-control-label" for=<?php  echo $d1['linfo']; ?>><?php  echo $d1['linfo']; ?> </label>
</div>
<?php } 

include("connexion.php"); 
$requete2="select  linfo from lang_info where linfo not in(".$t.")";
$r=mysqli_query($link,$requete2);$t="";
while($d1=mysqli_fetch_assoc($r))
  {$t.=','.$d1['linfo'];
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name=info[]" value=<?php  echo $d1['linfo']; ?> id=<?php  echo $d1['linfo']; ?>>
  <label class="custom-control-label" for=<?php  echo $d1['linfo']; ?>><?php  echo $d1['linfo']; ?> </label>
</div>
<?php } ?>
</div></div>

			<div class="form-group col-md-3">	
			
				<strong><label style="color: #FFBF00;">Systèmes d'exploitation</label></strong>
        <div class="">
				<?php
include("connexion.php"); 
$requete1="select distinct sys_ex from avoir_compet3,sys_exploitation where apogee=$apogee and sys_exploitation.id3=avoir_compet3.id3 ";
$r=mysqli_query($link,$requete1);$t='""';
while($d1=mysqli_fetch_assoc($r))
  {$t.=",'".$d1['sys_ex']."'";
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="sys_exp[]" value=<?php  echo $d1["sys_ex"]; ?> id=<?php  echo $d1['sys_ex']; ?> checked>
  <label class="custom-control-label" for=<?php  echo $d1['sys_ex']; ?>><?php  echo $d1['sys_ex']; ?> </label>
</div>
<?php } 

include("connexion.php"); 
$requete2="select  sys_ex from sys_exploitation where sys_ex not in(".$t.")";
$r=mysqli_query($link,$requete2);$t="";
while($d1=mysqli_fetch_assoc($r))
  {$t.=','.$d1['sys_ex'];
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name=sys_exp[]" value=<?php  echo $d1['sys_ex']; ?> id=<?php  echo $d1['sys_ex']; ?>>
  <label class="custom-control-label" for=<?php  echo $d1['sys_ex']; ?>><?php  echo $d1['sys_ex']; ?> </label>
</div>
<?php } ;?>

</div>
</div>
  <br>
		<div class="form-group col-md-3">

  <strong><label style="color: #FFBF00;">Langues</label></strong>
  <div class="">
<?php 
    include("connexion.php"); 
$requete1="select distinct lang from parler,langues where apogee=$apogee and langues.id4=parler.id4 ";
$r=mysqli_query($link,$requete1);$t='""';
while($d1=mysqli_fetch_assoc($r))
  {$t.=",'".$d1['lang']."'";
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="langues[]" value=<?php  echo $d1["lang"]; ?> id=<?php  echo $d1['lang']; ?> checked>
  <label class="custom-control-label" for=<?php  echo $d1['lang']; ?>><?php  echo $d1['lang']; ?> </label>
</div>
<?php } 

include("connexion.php"); 
$requete2="select  lang from langues where lang not in(".$t.")";
$r=mysqli_query($link,$requete2);$t="";
while($d1=mysqli_fetch_assoc($r))
  {$t.=','.$d1['lang'];
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name=langues[]" value=<?php  echo $d1['lang']; ?> id=<?php  echo $d1['lang']; ?>>
  <label class="custom-control-label" for=<?php  echo $d1['lang']; ?>><?php  echo $d1['lang']; ?> </label>
</div>
<?php } ;?>
 
</div></div>
  <br>
    </div>

   <div class="d-flex flex-row justify-content-end"><button  type="submit" class="btn btn-secondary btn-md  mb-4 mr-5" name="suivant" >Suivant</button>
</div>
		</form></div>
    
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