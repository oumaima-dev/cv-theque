<?php 
   session_start();
   if (isset($_SESSION['prenom'])) {
    include("connexion.php");
    $apoge=$_SESSION['apogee'];$prenom=$_SESSION['prenom'];

    $sql="SELECT * from etudiant where apogee='".$apoge."'";
    $result=mysqli_query($link,$sql);
    $data=mysqli_fetch_assoc($result);  
       
 ?>

<!DOCTYPE html>
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

  <br>

   
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
   <span class="navbar-text pl-5 ml-5" style="color: #FDE400;text-align: right; display: inline-block;"> Bonjour <?php echo $prenom; ?> </span>
   </ul>    
  </div>
</nav>


<div class="container mt-5">
  <h4 class="ml-0 pt-5"style="margin-top:-2%;color:#10C4BE; ">Les informations personelles </h4><br>
<form  method="POST" enctype="multipart/form-data"   >
    <div class="form-group row">
        <label class="col-md-4 col-form-label">Nom </label>
        <div class="col-md-6">
            <input type="text" name="nom" class="form-control" value="<?php echo($data['nom']); ?>" id="nom" required>
        </div>
    </div>     
    <div class="form-group row">
        <label class="col-md-4 col-form-label">Prenom </label>
        <div class="col-md-6">
            <input type="text" name="prenom" class="form-control"  value="<?php echo($_SESSION['prenom']); ?>" required>
        </div>
    </div>     
    <div class="form-group row">
        <label class="col-md-4 col-form-label">Numéro Apogée </label>
        <div class="col-md-6">
            <input type="number"  class="form-control" name="apogee" value="<?php echo($_SESSION['apogee']); ?>" required>
        </div>
    </div>        
    <div class="form-group row">
        <label for="datenaissance" class="col-md-4 col-form-label">Date de naissance </label>
        <div class="col-md-6">
            <input type="Date"  class="form-control" name="datenaissance" value="<?php if(isset($_POST['datenaissance'])) echo $_POST['datenaissance']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-md-4 col-form-label">Email</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="<?php echo($data['email']); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputTel" class="col-md-4 col-form-label">Numéro de téléphone </label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="Ntel" value="<?php if(isset($_POST['Ntel']))  echo $_POST['Ntel']; ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label  class="col-md-4 col-form-label">Adresse </label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="Adr" value="<?php if(isset($_POST['Adr'])) echo $_POST['Adr']; ?>" required >
        </div>
    </div>
    <div class="form-group row">
    <label class="col-md-4 col-form-label">Filière</label>
    <div class="col-md-6">
    <select class="form-control" name="fil" value="<?php if(isset($_POST['fil'])) echo $_POST['fil']; ?>">
      <option value="Genie informatique">Génie informatique</option>
      <option value="RST">RST</option>
      <option value="Genie industrielle">Génie industrielle</option>
      <option value="Genie mécatronique">Génie mécatronique</option>
      <option value="Genie électrique">Génie électrique</option>
    </select>
    </div>
    </div>
     <div class="form-group row">
      <label class="col-md-4 col-form-label">Photo</label>
<div class=" col-md-6 ">
  <input type="file" name="photo" id="photo" >
 </div>
</div>

     <div class="form-group row">
      <label class="col-md-4 col-form-label">Video</label>
<div class=" col-md-6 ">
  <input type="file" name="vido" id="video">
 </div>
</div>
    <div class="d-flex flex-row justify-content-end"><button  type="submit" class="btn btn-secondary btn-md  mt-5" name="suivant" >Suivant</button>
</div>

<?php 
  
  include("connexion.php");
    if (isset($_POST['suivant'])) {
    
    $adr=addslashes($_POST['Adr']);
    $tel=$_POST['Ntel'];
    $file=addslashes($_POST['fil']);
    $dn1=$_POST['datenaissance'];
    $dn2=explode('/', $dn1);
    ksort($dn2);
    $naiss=implode('-', $dn2);

    $dossier = 'images/'; 
    
    if ((isset($_FILES['photo']) and $_FILES['photo']['error']==0)) {
      $temp_name=$_FILES['photo']['tmp_name'];
      $infosfichier = pathinfo($_FILES['photo']['name']);
      $extension_upload = $infosfichier['extension'];
      $extension_upload = strtolower($extension_upload);
      $extensions_autorisees = array('png','jpeg','jpg');


      if (!in_array($extension_upload, $extensions_autorisees))
       exit($eror1="<div style='color:red;margin-bottom:30px;'>Erreur! Veuillez inserer une image svp (extensions autorisées: jpg)</div>");

       $pic=$_FILES['photo']['name'];

      if ($_FILES['photo']['size'] >= 1000000){
        exit($eror2="<div style='color:red;margin-bottom:30px;'>Erreur! le fichier est volumineux </div>") ;}
        if(!move_uploaded_file($temp_name, $dossier.$pic) ){exit($eror3="<div style='color:red;margin-bottom:30px;'>Problème dans le téléchargement de la photo! Réssayez </div>") ; }
    
    $sql2="UPDATE etudiant set tel=$tel,date_naissance='$naiss',filiere='$file',adresse='$adr',photo='$pic'  where apogee='".$apoge."'";
    $b=mysqli_query($link,$sql2);
    }


    if(isset($_FILES['vido']) and $_FILES['vido']['error']==0){
    $dos= 'video/'; 
    $tmp_name=$_FILES['vido']['tmp_name'];
    if(!is_uploaded_file($tmp_name)){
    exit("<div style='color:red;margin-bottom:30px;'>Oups!le fichier est untrouvable </div>");
    }
    $infosfichier = pathinfo($_FILES['vido']['name']);
    $extension_upload = $infosfichier['extension'];
    $extension_upload = strtolower($extension_upload);
     $extensions_autorisees = array('mp4','webm','ogg');


      if (!in_array($extension_upload, $extensions_autorisees))
       exit($eror1="<div style='color:red;margin-bottom:30px;'>Erreur! Veuillez inserer une video svp (extensions autorisées: mp4, webm , ogg)</div>");

     if ($_FILES['vido']['size'] >= 1000000000){
      exit("<div style='color:red;margin-bottom:30px;'>Erreur! le fichier est volumineux</div>");
    }
    $nom_video=$apoge.'.'.$extension_upload;
    if(!move_uploaded_file($tmp_name,$dos.$nom_video)){
    exit("<div style='color:red;margin-bottom:30px;'>Problème dans le téléchargement de la vidéo! Réssayez</div>");
    }
    $vid_name=$nom_video;

  $requette="UPDATE `etudiant` SET `video`='$vid_name' WHERE `apogee`=$apoge";
  $resu=mysqli_query($link,$requette);}    

    if ($b==true && $resu==true) { ?>
       <script>
         window.location.href="form2.php";
       </script>
     <?php }} ?>  

     
</form></div><br><br>
<footer style="background-color: #232121;  " id="footer" class="pt-3 pb-2 w-100 h-20 d-inline-block " >
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