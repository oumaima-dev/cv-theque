<?php
session_start();
if (isset($_SESSION['nom'])) {
$password=$_SESSION['password'];
$nom=$_SESSION['nom'];
include('connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
  <title>Recherche</title>
  <meta charset="utf-8">
  <meta name="author" content="chkioua yasmine">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <style type="text/css">
    #footer h5 ,p{}
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
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="accueilEntreprise.php">Accueil</a>
      </li>
      <li>
        <a class="nav-link" href="rechercheMultiCritere.php">Consulter les CVs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle pr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
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

<div class="col-md-2 mb-5" style=" position: fixed; ">
  <img src="photos/ensaklogo.png" class="mt-5" style="width: 90%;"><br><br>
  <p style="text-align: justify;" class="col-sm-12"> L'École Nationale des Sciences Appliquées de Kénitra est une grande école d’ingénieurs marocaine créée en 2008 par un partenariat entre l'Université Ibn-Tofail et l’Institut national des sciences appliquées de Lyon.</p>
</div>

<h3 class=" mt-5 pb-4 col-md-9 offset-md-1" style="text-align: center; position: relative; top: 40px;">Consultez nos CVs</h3>
<section class="col-md-10 offset-md-2 row">

<div class="col-md-9 row d-flex justify-content-center p-4" >
<?php include("connexion.php"); 
if(isset($_GET['envoyer']))

{
	$aa=$_GET['fil'];


if (isset($_GET['b'])) {
$b=$_GET['b'];$p=implode(',',$b);	
}
else {$p=0;}

if (isset($_GET['l'])) {
$c=$_GET['l'];$m=implode(',',$c);	
}
else {$m=0;}

if (isset($_GET['li'])) {
$d=$_GET['li'];$l=implode(',',$d);	
}
else {$l=0;}

if (isset($_GET['sy'])) {
$e=$_GET['sy'];$n=implode(',',$e);
}
else { $n=0;}

$r1="SELECT apogee from avoir_compet1 where id1 in ($p)";
$r2="SELECT apogee from avoir_compet2 where id2 in ($l)";
$r3="SELECT apogee from avoir_compet3 where id3 in ($n)";
$r4="SELECT apogee from parler where id4 in ($m)";
$r5="SELECT apogee from etudiant where filiere='$aa'";
$v=0;$z=0;$l=0;
$r11=mysqli_query($link,$r1);$n=mysqli_num_rows($r11);
if($n!=0){ while($d1=mysqli_fetch_assoc($r11)) { 
$tab[$v]=$d1['apogee']; $v++;
}}
$r22=mysqli_query($link,$r2);$n=mysqli_num_rows($r22);
if($n!=0){while($d2=mysqli_fetch_assoc($r22)) { 
$tab[$v]=$d2['apogee']; $v++;
}}
$r33=mysqli_query($link,$r3);$n=mysqli_num_rows($r33);
if($n!=0){ while($d3=mysqli_fetch_assoc($r33)) { 
$tab[$v]=$d3['apogee']; $v++;
}}
$r44=mysqli_query($link,$r4);$n=mysqli_num_rows($r44);
if($n!=0){ while($d4=mysqli_fetch_assoc($r44)) { 
$tab[$v]=$d4['apogee']; $v++;
}}
$r55=mysqli_query($link,$r5);$n=mysqli_num_rows($r55);
if($n!=0){ while($d5=mysqli_fetch_assoc($r55)) { 
$tab[$v]=$d5['apogee']; $v++;
}}
$k=count($b)+count($d)+count($e)+count($c)+1;
for ($i=0; $i<count($tab); $i++) { 
  for ($j=0; $j<count($tab) ; $j++) { 
    if($tab[$i]==$tab[$j]){$l++;} 
  }
  if($l==$k) { $T[$z]=$tab[$i]; $z++; } 
 $l=0;
}

$x=implode(',',$T);


$r6="SELECT * from etudiant where apogee in ($x)";
$f=mysqli_query($link,$r6);
if (mysqli_num_rows($f)==0) { echo '<h5 class="col-md-10" style="text-align: center;"><br><br>Il n\'y a aucun CV qui satisfait les critères slectionnés</h5>
<img src="photos/recherche.gif" style="height: 70%; width: 80%;" class="mb-5 pb-5 mt-0">';
  }
while($d=mysqli_fetch_assoc($f))
	{ $apo=$d['apogee'];
	
?>
	<div class="card mt-3 m-2" style="width: 10rem; height: 23rem;">
		<img src="photos/multi.jpg" class="card-img-top">
  		<div class="card-body">
    	<h5 class="card-title"><?php echo $d['nom'].' '.$d['prenom']; ?></h5>
    	<p class="card-text"><?php  echo $d['filiere']; ?></p>
   		<form action="cvEnt.php" method="post"><button name="apo" type="submit" class="btn btn-dark" value=<?php echo $apo;?> >Voir CV</button></form>
  		</div>
	</div>

<?php }
 } 

else { ?>
  <br>
  <h5 class="col-md-10" style="text-align: center;">Sélectionnez les critères que vous souhaitez dans le formulaire à droite</h5>
<img src="photos/recherche.gif" style="height: 70%; width: 80%;" class="mb-5 pb-5 mt-0">

  <?php } ?>
</div>

<div class="col-md-3 p-4 mb-5">
  <form action="#" method="get">
    <div class="form-group">
      <label><h5>Filière:</h5></label>
      <select name="fil" class="form-control" required="required">
      <option value="Genie informatique">Génie informatique</option>
      <option value="RST">RST</option>
      <option value="Genie industrielle">Génie industrielle</option>
      <option value="Genie mécatronique">Génie mécatronique</option>
      <option value="Genie électrique">Génie électrique</option>
      </select>
      </div>

    <div class="form-group">
      <label><h5>Compétences bureautiques:</h5></label>
      <select   name="b[]" multiple="multiple" class="form-control" >
        <option value="1">Word</option>
        <option value="2">Excel</option>
        <option value="3">Power Point</option>
        <option value="4">Access</option>
      </select> 
      </div>

    <div class="form-group">
      <label><h5>Langues:</h5></label>
      <select name="l[]" multiple="multiple" class="form-control" >
        <option value="1">Arabe</option>
        <option value="2">Français</option>
        <option value="3">Anglais</option>
        <option value="4">Espagnol</option>
        <option value="5">Allemand</option>
        <option value="6">Mandarin</option>
      </select> 

      </div>

      <div class="form-group">
        <label><h5>Langages informatiques:</h5></label>
      <select name="li[]" multiple="multiple" class="form-control">
        <option value="2">Java</option>
        <option value="1">Javascript</option>
        <option value="3">PHP</option>
        <option value="4">C,C++</option>
        <option value="5">Pascal</option>
        <option value="6">Python</option>
      </select>

      </div>
  
    <div class="form-group">
      <label><h5>Systèmes d'exploitation:</h5></label>
      <select name="sy[]" multiple="multiple" class="form-control" >
        <option value="1">Windows</option>
        <option value="2">MAC-OS</option>
        <option value="3">Linux</option>
      </select>
    </div>
    <button class="btn btn-dark mb-2" type="submit" name="envoyer" value="envoyer">Rechercher</button>   
  </form>
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