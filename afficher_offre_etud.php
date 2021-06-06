<?php
include ("connexion.php");
$id_offre=$_POST['id6'];
session_start();
if (isset($_SESSION['prenom'])) {
$prenom=$_SESSION['prenom'];
$apogee=$_SESSION['apogee'];

?>

<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
	<title>afficher offre</title>
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

<div class="row">
<div class="col-md-2 mt-5" style=" position: fixed; ">
  <img src="photos/ensaklogo.png" class="mt-5" style="width: 90%;"><br><br>
  <p style="text-align: justify;" class="col-sm-12"> L'École Nationale des Sciences Appliquées de Kénitra est une grande école d’ingénieurs marocaine créée en 2008 par un partenariat entre l'Université Ibn-Tofail et l’Institut national des sciences appliquées de Lyon.</p>
</div>

<div class="col-md-3 offset-md-9 p-4 " style="overflow:auto; background-color: #717B83; position: fixed; top: 130px; color: white;">
  <h5 style="text-align: justify;" class="col-md-12">Vous trouverez ici les détails de l'offre. Si vous êtes intéressés vous pouvez y postuler en cliquant sur le boutton en bas. Votre candidature s'affichera chez l'entreprise concernée.</h5>
</div>
</div>


<h3 class="pt-5 mt-5" style="text-align: center;"></h3>
<section class="d-flex flex-row justify-content-center">
<div class="col-md-3"></div>

<div class="col-md-9" style="position: relative; right: 120px;">

<div class="col-md-9 d-flex flex-row justify-content-end mt-3" style="background-color: #1C797E; color: white; text-align: center;">
  <div class="col-md-8 mt-2 pb-3 pt-3">

   <h2 style="color: white;" class="mt-5 "><?php 
 $sql="SELECT `code` FROM `offre` WHERE `id6`='".$id_offre."'";
 $r=mysqli_query($link,$sql);
 $d=mysqli_fetch_assoc($r);
 $sqll="SELECT `nom` FROM `entreprise` WHERE `code`='".$d['code']."'";
 $rr=mysqli_query($link,$sqll);
 $dd=mysqli_fetch_assoc($rr);
 $nom=$dd['nom'];
echo $nom ; ?> </h2>

 <h4 style="color: white; "><?php 
 $sql0="SELECT `intitule` FROM `offre` WHERE `id6`='$id_offre'";
 $r0=mysqli_query($link,$sql0);
 $d0=mysqli_fetch_assoc($r0);
 $intitule=$d0['intitule'];
echo $intitule; ?></h4>
   </div>  
  <img src="photos/entreprise.png" class= "w-25 h-25 col-md-4 mt-3" style="border-radius: 50%;">
</div>

<div class="col-md-9 pt-3 pl-5" style="background-color: #F6F5F4;">
<h4 style="color: #10C4BE;">Type:</h4>
<h6 class="ml-4"><i class="fa fa-angle-right"></i>
<?php 
 $sql4="SELECT `type` FROM `offre` WHERE `id6`='$id_offre'";
 $r4=mysqli_query($link,$sql4);
 $d4=mysqli_fetch_assoc($r4);
 $type=$d4['type'];
echo $type; ?></h6>

<h4 style="color: #10C4BE;">Durée:</h4>
<h6 class="ml-4"><i class="fa fa-angle-right"></i>
<?php 
 $sql3="SELECT `duree` FROM `offre` WHERE `id6`='$id_offre'";
 $r3=mysqli_query($link,$sql3);
 $d3=mysqli_fetch_assoc($r3);
 $duree=$d3['duree'];
echo $duree.' '."mois"; ?></h6>

  <h4 style="color: #10C4BE;">Date:</h4>
<h6 class="ml-4"><i class="fa fa-angle-right"></i><?php 
 $sql2="SELECT `date` FROM `offre` WHERE `id6`='$id_offre'";
 $r2=mysqli_query($link,$sql2);
 $d2=mysqli_fetch_assoc($r2);
 $date=$d2['date'];
echo ' '.$date; ?></h6>


<h4 style="color: #10C4BE;">Description:</h4>
<h6 class="ml-4"><i class="fa fa-angle-right"></i>
<?php 
 $sql9="SELECT `description` FROM `offre` WHERE `id6`='$id_offre'";
 $r9=mysqli_query($link,$sql9);
 $d9=mysqli_fetch_assoc($r9);
 $des=$d9['description'];
 echo $des; ?></h6>

<h4 style="color: #10C4BE;">Compétences requises:</h4>
<ul ><li ">
<?php  
$sql5="SELECT `id1` FROM `offre_compet1` WHERE `id6`=$id_offre";
$r5=mysqli_query($link,$sql5);
echo'<h5 ">Bureautique: </h5></li>'; 
while($d5=mysqli_fetch_assoc($r5)){
	$sql55="SELECT `b` FROM `bureautique` WHERE `id1`='".$d5['id1']."'";
	$r55=mysqli_query($link,$sql55);
	$d55=mysqli_fetch_assoc($r55);
	foreach ($d55 as $b) {
		echo "<h6>$b <br></h6>";
	}
}

$sql6="SELECT `id2` FROM `offre_compet2` WHERE `id6`=$id_offre";
$r6=mysqli_query($link,$sql6);
echo'<li "><h5 ">Langages informatiques: </h5></li>'; 
while($d6=mysqli_fetch_assoc($r6)){
	$sql66="SELECT `linfo` FROM `lang_info` WHERE `id2`='".$d6['id2']."'";
	$r66=mysqli_query($link,$sql66);
	$d66=mysqli_fetch_assoc($r66);
	foreach ($d66 as $linfo) {
		echo "<h6>$linfo <br></h6>";
	}
}

$sql7="SELECT `id3` FROM `offre_compet3` WHERE `id6`=$id_offre";
$r7=mysqli_query($link,$sql7);
echo'<li " ><h5 ">Systemes d\'esxploitation: </h5></li>'; 
while($d7=mysqli_fetch_assoc($r7)){
	$sql77="SELECT `sys_ex` FROM `sys_exploitation` WHERE `id3`='".$d7['id3']."'";
	$r77=mysqli_query($link,$sql77);
	$d77=mysqli_fetch_assoc($r77);
	foreach ($d77 as $sys_ex) {
		echo "<h6>$sys_ex <br></h6>";
	}
}

$sql8="SELECT `id4` FROM `offre_compet4` WHERE `id6`=$id_offre";
$r8=mysqli_query($link,$sql8);
echo'<li "><h5 ">Langues:</h5></li>'; 
while($d8=mysqli_fetch_assoc($r8)){
	$sql88="SELECT `lang` FROM `langues` WHERE `id4`='".$d8['id4']."'";
	$r88=mysqli_query($link,$sql88);
	$d88=mysqli_fetch_assoc($r88);
	foreach ($d88 as $langue) {
		echo "<h6>$langue <br></h6>";
	}
}
?>
</ul>
<br>

<form class="form-inline my-2 my-lg-0 d-flex flex-row justify-content-end" method="post" action="postuler.php">
  <button type="submit" name="postuler" value="<?php echo $id_offre; ?>" class="btn btn-dark">
  Postuler
</button></form></div></div>
<br>
</div></section>

<footer style="background-color: #232121; " id="footer" class="mt-5 pt-3 pb-2 w-100 h-20 d-inline-block" >
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
<?php } else header("Location:broken.php") ?>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>