<?php
include("connexion.php");
session_start();
if (isset($_SESSION['nom'])) {
$password=$_SESSION['code'];
$nom=$_SESSION['nom'];
$apogee=$_POST['apo'];


$r1="select * from etudiant where apogee='".$apogee."'";
$f1=mysqli_query($link,$r1);

$r2="select nom,etablissement,date_obtention from diplome,obtenir where obtenir.id0=diplome.id0 and apogee='".$apogee."'";
$f2=mysqli_query($link,$r2);

$r3="select position ,organisme,date_debut,date_fin from expre_prof,avoir_exp where expre_prof.id5 =avoir_exp.id5 and avoir_exp.apogee='".$apogee."'";
$f3=mysqli_query($link,$r3);

$r4="select distinct b from bureautique,avoir_compet1,etudiant where etudiant.apogee=avoir_compet1.apogee  and bureautique.id1=avoir_compet1.id1 and etudiant.apogee='".$apogee."'";
$f4=mysqli_query($link,$r4);

$r5="select  linfo from lang_info,avoir_compet2,etudiant where  etudiant.apogee=avoir_compet2.apogee and lang_info.id2=avoir_compet2.id2 and etudiant.apogee='".$apogee."'";
$f5=mysqli_query($link,$r5);

$r6="select  lang from langues, parler,etudiant where etudiant.apogee=parler.apogee and parler.id4=langues.id4 and etudiant.apogee='".$apogee."'";
$f6=mysqli_query($link,$r6);

$r7="select sys_ex from sys_exploitation,avoir_compet3,etudiant where etudiant.apogee=avoir_compet3.apogee  and sys_exploitation.id3 =avoir_compet3.id3 and etudiant.apogee='".$apogee."'";
$f7=mysqli_query($link,$r7);
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
  <title>CV</title>
  <meta charset="utf-8">
  <meta name="author" content="chkioua yasmine">
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

<h3 class="pt-5 mt-5 col-md-8 offset-md-2" style="text-align: center;">CV de <?php 
$d1=mysqli_fetch_assoc($f1);
  echo $d1['nom'].' '.$d1['prenom'];?></h3>

<?php
include("connexion.php");
$sql="SELECT filiere from etudiant where apogee='".$apogee."'";
$r=mysqli_query($link,$sql);
$d=mysqli_fetch_assoc($r);
if ($d['filiere']!='') { 
?>

<section class="d-flex flex-row justify-content-center mr-5 mb-5">
<div class="col-md-3"></div>

<div>

<div class="col-md-8 d-flex flex-row justify-content-end mt-5" style="background-color: #1C797E; color: white; text-align: center;">
  <div class="col-md-8 mt-2 pb-3 pt-3">

  <h4 style="color: white;"><?php 

  echo $d1['nom'].' '.$d1['prenom'];?></h4>
  <h4 style="color: white;"><?php echo $d1['filiere'];?> </h4>
  </div>  
  <?php if($d1['photo']!='') echo '<img src="images/'.$d1['photo'].'" class= "w-25 h-25 col-md-4 mt-2 mb-2" style="border-radius: 50%;">';
  else echo '<img src="images/sansphoto.png" class= "w-25 h-25 col-md-4 mt-2 mb-2" style="border-radius: 50%;">'?>

</div>

<div class="col-md-8 pt-3 pl-5" style="background-color: #F6F5F4;">
  <div class="row"> <img src="photos/perso1.png" class="pr-2" style="width: 30px; height: 30px;"><h4 style="color: #10C4BE;" class="pt-2">Information personnelles:</h4></div>
  <h6><strong><br>Téléphone: </strong><?php echo $d1['tel']; ?></h6>
  <h6><strong>E-mail:</strong> <?php echo $d1['email']; ?></h6>
  <h6><strong>Date de naissance: </strong><?php echo $d1['date_naissance']; ?></h6>
  <h6><strong>Adresse: </strong><?php echo $d1['adresse']; ?></h6>
  <br>

   <div class="row"> <img src="photos/diplome1.png" class="pr-2" style="width: 50px; height: 50px;"><h4 style="color: #10C4BE;" class="pt-2">Diplomes obtenus:</h4></div>
  <?php
  while ($d2=mysqli_fetch_assoc($f2)) {
 ?>
  <h6><strong><br>Intitulé du diplome:</strong> <?php echo $d2['nom']; ?></h6>
  <h6><strong>Etablissement:</strong> <?php echo $d2['etablissement']; ?></h6>
  <h6><strong>Année d'obtention du diplome:</strong> <?php echo $d2['date_obtention']; ?></h6>
  <?php } ?>

  <br>
   <div class="row"> <img src="photos/exp1.png" class="pr-2" style="width: 50px; height: 50px;"><h4 style="color: #10C4BE;" class="pt-2">Experience professionnelle:</h4></div>
  <?php
 while ($d3=mysqli_fetch_assoc($f3)) {
 ?><br>
  <h6><strong>Position occupée:</strong> <?php echo $d3['position']; ?> </h6>
  <h6><strong>Organisme:</strong> <?php echo $d3['organisme']; ?> </h6>
  <h6><strong>Date début:</strong> <?php echo $d3['date_debut']; ?> </h6>
  <h6><strong>Date fin:</strong> <?php echo $d3['date_fin']; ?> </h6>
  <?php } ?>

  <br><div class="row"> <img src="photos/compet1.png" class="pr-2" style="width: 50px; height: 50px;"><h4 style="color: #10C4BE;" class="pt-2">Compétences:</h4></div>
<br>
  <h6><strong>Burautique:</strong> <?php echo "<ul>";
  while($d4=mysqli_fetch_assoc($f4))
  {echo "<li>".$d4['b']."</li>";  
  } 
echo "</ul>";
  ?> </h6>

  <h6><strong>Langage informatique:</strong> <?php echo "<ul>";
  while($d5=mysqli_fetch_assoc($f5))
{echo "<li>".$d5['linfo']."</li>";  
}
echo "</ul>";
 ?></h6>

  <h6><strong>Langues:</strong> <?php echo "<ul>";
  while($d6=mysqli_fetch_assoc($f6))
{echo "<li>".$d6['lang']."</li>";  
} 
echo "</ul>";
?> </h6>

  <h6><strong>Système d'exploitation:</strong> <?php echo "<ul>";
  while($d7=mysqli_fetch_assoc($f7))
{echo "<li>".$d7['sys_ex']."</li>";  
} 
echo "</ul>";
?> </h6>

  <br><div class="row"> <img src="photos/video1.png" class="pr-2" style="width: 50px; height: 50px;"><h4  style="color: #10C4BE;" class="mb-5 pt-2">Video:</h4></div>
    <video class="mb-5" width="320" height="240" controls="controls" class="ml-5">
  <source src="video/<?php echo $apogee.'.mp4' ;?>" type="video/mp4"/>
  </video>

</div>

</div>
</section>
<?php }?>
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