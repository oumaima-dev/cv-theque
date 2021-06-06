 <?php session_start();
if (isset($_SESSION['nom'])) {
$nom=$_SESSION['nom']; 
$id6=$_POST['apo'];
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<title>Modifier offre</title>
	<meta charset="utf-8"/>
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
           <a class="dropdown-item" href="mesoffres1.php">mes offres </a>
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

<div class="col-md-2 mt-3" style="position: fixed;">
  <img src="photos/ensa-logo-1.png" class="mt-5" style="width: 100%;"><br><br>
  <p style="text-align: justify;" class="col-sm-12"> L'École Nationale des Sciences Appliquées de Kénitra est une grande école d’ingénieurs marocaine créée en 2008 par un partenariat entre l'Université Ibn-Tofail et l’Institut national des sciences appliquées de Lyon.</p>
</div>

<h5 class="card-title " >Card title</h5>
<section class="d-flex flex-row justify-content-center" >
<div class=" mt-5 pt-4 ml-5 mb-5" style="width: 900px;">
  <div class=" mt-2 pt-3">
<div style="background-color:#1C797E ;">   
<h1 class="ml-2" style="text-align: center;color: white;vertical-align: middle;padding: 40px;">Modifier votre offre de stage: </h1>
</div> 
<?php
include("connexion.php"); 
$requete="select * from offre where id6=".$id6;
$r=mysqli_query($link,$requete);
$d1=mysqli_fetch_assoc($r);
?>
 <form action="traitement-offre_modif.php" class="mt-5" method="POST">
  <div class="form-group row">
    <label for="formGroupExampleInput" class="col-md-3 ml-3" style="font-weight: bold;color: #DCAB38;">Intitulé:</label>
<textarea class="form-control col-md-8 " id="formGroupExampleInput"name="intitule"><?php echo $d1['intitule']; ?></textarea>
   
  </div>
 	
    <div class="form-group row">
      <label class="col-md-3 ml-3" for="inlineFormCustomSelect" style="font-weight: bold;color:#DCAB38;">Filière:</label>
      <select class="custom-select col-md-8" id="inlineFormCustomSelect" name="filiere">
        <option value="Genie Informatique"<?php  if ("Genie Informatique"==$d1['filiere']) echo 'selected';?>>Génie Informatique </option>
 		<option value="Genie Industriel"<?php  if ("Genie Industriel"==$d1['filiere']) echo 'selected';?>>Génie Industriel</option>
 		<option value="Genie Electrique"<?php  if ("Genie Electrique"==$d1['filiere']) echo 'selected';?>>Génie Electrique</option>
 		<option value="Genie Mecatronique"<?php  if ("Genie Mecatronique"==$d1['filiere']) echo 'selected';?>>Génie Mecatronique</option>
 		<option value="Genie RST"<?php  if ("Genie RST"==$d1['filiere']) echo 'selected';?>>Génie RST</option>
      </select>
    </div>
 	 <br>


 	<div class="form-group row">
    <label class="col-md-3 ml-3" for="formGroupExampleInput2" style="font-weight: bold;color: #DCAB38;">Date: </label>
    <input type="date"" class="form-control col-md-8" id="formGroupExampleInput2" name="date" value=<?php echo $d1['date']; ?>>
  </div>

  	<div class="form-group row">
    <label for="formGroupExampleInput" class="col-md-3 ml-3" style="font-weight: bold;color: #DCAB38;">Durée :</label>
    <input type="NUMBER" class="form-control col-md-8" id="formGroupExampleInput" name="duree"value=<?php echo $d1['duree'];  ?>>
  </div>

    <div class="form-group row">
      <label class="col-md-3 ml-3" for="inlineFormCustomSelect" style="font-weight: bold;color: #DCAB38;">Type: </label>
      <select class="custom-select col-md-8" id="inlineFormCustomSelect"  name="type">
      	
      <?php  
      echo '<option value="Observation"';
       if ("Observation"==$d1['type']) echo 'selected>Observation </option>';
       else echo '>Observation </option>';?>
 		<option value="Operationnel"<?php  if ("Operationnel"==$d1['type']) echo 'selected';?>>Opérationel</option>
 		<?php echo '<option value="PFE"'; 
 		if ("PFE"==$d1['type']) 
 		echo 'selected>PFE</option>' ;
 	    else echo '>PFE </option>';?>?>
 		<option value="Pre-embauche"<?php if ("Pre-embauche"==$d1['type']) echo 'selected'; ?>>Pré-embauche</option>
      </select>
    </div>
 	<br>
<h4 class="ml-2" style="text-decoration: underline; ">Compétences requises: </h4><br>
<div class="form-group row">
<label style="font-weight: bold;color: #DCAB38;" class="col-md-5 ml-3">Bureautique</label>
<div class="col-md-6">

<?php
include("connexion.php"); 
$requete1="select  distinct bureautique.b from offre_compet1,offre,bureautique where offre_compet1.id6=offre.id6 and bureautique.id1=offre_compet1.id1 and offre.id6=".$id6;
$r=mysqli_query($link,$requete1);$t='""';
while($d1=mysqli_fetch_assoc($r))
	{$t.=",'".$d1['b']."'";
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="bureau[]" value=<?php  echo $d1['b']; ?> id=<?php  echo $d1['b']; ?> checked>
  <label class="custom-control-label" for=<?php  echo $d1['b']; ?>><?php  echo $d1['b']; ?> </label>
</div>
<?php } 

include("connexion.php"); 
$requete1="select  b from bureautique where b not in(".$t.")";
$r=mysqli_query($link,$requete1);
while($d1=mysqli_fetch_assoc($r))
	{
?> <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="bureau[]" value=<?php  echo $d1['b']; ?> id=<?php  echo $d1['b']; ?>>
  <label class="custom-control-label" for=<?php  echo $d1['b']; ?>><?php  echo $d1['b']; ?> </label>
</div>
<?php } ;?>
</div></div>
 	
 	<br>
   <div class="form-group row">
 	<label class="col-md-5 ml-3" style="font-weight: bold;color: #DCAB38;">Langages Informatiques</label>
 
    <div class="col-md-6">
    	<?php
include("connexion.php"); 
$requete1="select  distinct linfo from offre_compet2,offre,lang_info where offre_compet2.id6=offre.id6 and lang_info.id2=offre_compet2.id2 and offre.id6=".$id6;
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
<?php } ;?>
</div></div>
<br>
<div class="form-group row">
 	<label style="font-weight: bold;color: #DCAB38;"  class="col-md-5 ml-3">Systèmes d'exploitation</label><br>
<div class="col-md-6" >
		<?php
include("connexion.php"); 
$requete1="select distinct sys_ex from offre_compet3,offre,sys_exploitation where offre_compet3.id6=offre.id6 and sys_exploitation.id3=offre_compet3.id3 and offre.id6=".$id6;
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
  <div class="form-group row">
  <label style="font-weight: bold;color: #DCAB38;" class="col-md-5 ml-3">Langues: </label><br>
  <div class="col-md-6">
  	<?php 
  	include("connexion.php"); 
$requete1="select distinct lang from offre_compet4,offre,langues where offre_compet4.id6=offre.id6 and langues.id4=offre_compet4.id4 and offre.id6=".$id6;
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

 	<div class="input-group">
  <div class="input-group-prepend ml-3">
    <span class="input-group-text " style="color: black;font-weight: bold;" >Description:</span>
  </div>
  <?php
  include("connexion.php"); 
$requete2="select  description from offre where id6 =".$id6;
$r=mysqli_query($link,$requete2);$t="";
$d1=mysqli_fetch_assoc($r);?>
  <textarea class="form-control col-md-8 " aria-label="With textarea" name="description"><?php echo $d1['description']; ?></textarea>
</div>
 <br>
<div class="d-flex flex-row justify-content-end" >
  <button class="btn btn-secondary btn-md col-md-2 mr-2" type="submit" name="submit" value=<?php echo $id6 ;?>>ENREGISTRER</button>
</div>
 </form>
</div></div></section>

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
