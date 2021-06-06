<?php
session_start();
if (isset($_SESSION['prenom'])) {
  

$prenom=$_SESSION['prenom'];
$apogee=$_SESSION['apogee'];
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/ico" href="photos/favicon.ico">
  <title>Accueil Etudiant</title>
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

<div class="col-md-2 mt-5" style=" position: fixed; ">
  <img src="photos/ensaklogo.png" class="mt-4" style="width: 90%;"><br><br>
  <p style="text-align: justify;" class="col-sm-12"> L'École Nationale des Sciences Appliquées de Kénitra est une grande école d’ingénieurs marocaine créée en 2008 par un partenariat entre l'Université Ibn-Tofail et l’Institut national des sciences appliquées de Lyon.</p>
</div>


<?php
include("connexion.php");
$sql1="SELECT filiere from etudiant where apogee='".$apogee."'";
$r1=mysqli_query($link,$sql1);
$d1=mysqli_fetch_assoc($r1);
if ($d1['filiere']!='') { 
?>
<div class="col-sm-18 d-flex flex-row justify-content-center">
<div class="col-sm-1"></div>
<h3 class="pt-5 mt-5 col-sm-17" >Bienvenue <?php echo $prenom; ?> sur ESCC!</h3> 
</div>
<div class="col-sm-18 d-flex flex-row justify-content-center">
<div class="col-sm-1"></div>
<h3 class="col-sm-17" >Voici des offres de stage qui peuvent vous intéresser</h3>
</div>

<section class="flex-row col-md-12 d-flex justify-content-end">

<div class="col-md-7 row d-flex justify-content-center p-4">
<?php
$fil=$d1['filiere'];
$sql2="SELECT * from offre where filiere='".$fil."'";
$r2=mysqli_query($link,$sql2);
while ($d2=mysqli_fetch_assoc($r2)) {
$id6=$d2['id6'];
$code=$d2['code'];
$sql3="SELECT nom from entreprise where code='".$code."'";
$r3=mysqli_query($link,$sql3);
$d3=mysqli_fetch_assoc($r3);
?>
<div class="card m-2" style="width: 10rem;">
  <img src="photos/offre.jpg" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title"><?php echo $d3['nom']; ?></h5>
    <p class="card-text"><?php echo $d2['intitule']; ?></p>
    <form action="afficher_offre_etud.php" method="post"><button type="submit" name="id6" class="btn btn-dark" value="<?php echo $id6;?>" >Voir Offre</button></form>
  </div>
</div>
<?php } ?>
</div>

  <div class="col-md-3 p-4 " style="background-color: #FAFAFA; height: 30%;">
    <form action="select.php" method="get" class="">
    <div class="form-group">
      <label><h5>Sélectionnez les offres par filière:</h5></label>
      <select class="form-control" name="fil">
        <option value="Genie informatique"  >Génie informatique</option>
        <option value="Genie RST"  >Génie RST</option>
        <option value="Genie industriel"  >Génie industriel</option>
        <option value="Genie mecatronique"  >Génie mécatronique</option>
        <option value="Genie electrique"  >Génie électrique</option>
      </select>
    </div>
        <div class="form-group">
      <label><h5>Sélectionnez les offres par leur type:</h5></label>
      <select class="form-control" name="type">
        <option value="Observation" >Observation</option>
        <option value="Operationnel"  >Opérationnel</option>
        <option value="PFE"  >PFE</option>
        <option value="Pre-embauche"  >Pré-embauche</option>
      </select>
    </div>
  <button class="btn btn-dark" type="submit" name="select">Selectionner</button>
    </form>
  </div>

</section>
<div class="col-sm-18 d-flex flex-row justify-content-center">
<div class="col-sm-1"></div>
<h5 class="col-sm-17 pb-5" style="text-align: center;">Vous pouvez personnaliser la recherche d'offres de stage en utilisant le formulaire à droite</h5>
</div>
<?php
}
else {
?>

<h3 class="pt-5 mt-5" style="text-align: center;">Bienvenue sur ESCC</h3> <h5 style="text-align: center;"> Vous pouvez consulter sur votre droite les offres de stages qui vous interesse</h5>

<section class="col-md-12 d-flex flex-row justify-content-end">

<div class="col-md-6 m-5">
    <div class="card text-white bg-secondary">
      <img src="photos/cv.jpg" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo $prenom.', '; ?>votre CV est incomplet!</h5>
        <p class="card-text">Veuillez le complétez afin de continuer votre navigation</p>
        <a href="form1.php" class="btn btn-dark">Completer mon CV</a>
      </div>
    </div>
</div>

<div class="col-md-3 p-4 mt-5" style="background-color: #FAFAFA; height: 30%;">
  <form action="select.php" method="get" class="">
    <div class="form-group">
      <label for="exampleFormControlSelect1"><h5>Sélectionnez les offres par filière:</h5></label>
      <select class="form-control" name="fil">
        <option value="Genie informatique"  >Génie informatique</option>
        <option value="Genie RST"  >Génie RST</option>
        <option value="Genie industriel"  >Génie industriel</option>
        <option value="Genie mecatronique"  >Génie mécatronique</option>
        <option value="Genie electrique"  >Génie électrique</option>
      </select>
    </div>
        <div class="form-group">
      <label for="exampleFormControlSelect1"><h5>Sélectionnez les offres par leur type:</h5></label>
      <select class="form-control" name="type">
        <option value="Observation" >Observation</option>
        <option value="Operationnel"  >Opérationnel</option>
        <option value="PFE"  >PFE</option>
        <option value="Pre-embauche"  >Pré-embauche</option>
      </select>
    </div>
  <button class="btn btn-secondary" type="submit" name="select">Selectionner</button>
    </form>
  </div>

</section>

<?php } ?>
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
<?php } else header("Location:broken.php") ?>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>