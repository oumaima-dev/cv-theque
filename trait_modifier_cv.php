<?php
session_start();
    include("connexion.php");
    $apogee=$_SESSION['apogee'];$prenom=$_SESSION['prenom'];
   $mail=$_POST['email'];
   $dn1=$_POST['datenaissance'];
    $dn2=explode('/', $dn1);
    ksort($dn2);
    $date=implode('-', $dn2);
   $tel=$_POST['Ntel'];
   $adresse=$_POST['Adr'] ;
   $fil=addslashes($_POST['fil']);
	$dossier = 'images/'; 
    
   $req="UPDATE `etudiant` SET `email`='$mail', date_naissance=$date , tel=$tel, adresse= '$adresse', filiere=$fil WHERE `apogee`=$apogee";
   $res=mysqli_query($link,$req);
    if ((isset($_FILES['photo']) and $_FILES['photo']['error']==0)) {
      $temp_name=$_FILES['photo']['tmp_name'];
      $infosfichier = pathinfo($_FILES['photo']['name']);
      $extension_upload = $infosfichier['extension'];
      $extension_upload = strtolower($extension_upload);
      $extensions_autorisees = array('png','jpeg','jpg');


      if (!in_array($extension_upload, $extensions_autorisees))
       exit($eror1="<div style='color:red;margin-bottom:30px;'>Erreur! Veuillez inserer une image svp (extensions autorisées: png, jpeg , jpg)</div>");

       $pic=$apogee.'.'.$extension_upload;

      if ($_FILES['photo']['size'] >= 1000000){
        exit($eror2="<div style='color:red;margin-bottom:30px;'>Erreur! le fichier est volumineux </div>") ;}
        if(!move_uploaded_file($temp_name, $dossier.$pic) ){exit($eror3="<div style='color:red;margin-bottom:30px;'>Erreur!  probleme dans le telechargement </div>") ; }
    
    $sql2="UPDATE etudiant set tel=$tel,date_naissance='$date',filiere='$fil',adresse='$adresse',photo='$pic'  where apogee='".$apogee."'";
    $b=mysqli_query($link,$sql2);}

    if(isset($_FILES['vido']) and $_FILES['vido']['error']==0){
    $dossier= 'video/'; 
    $temp_name=$_FILES['vido']['tmp_name'];
    if(!is_uploaded_file($temp_name)){
    exit("le fichier est untrouvable");
    }
    $infosfichier = pathinfo($_FILES['vido']['name']);
    $extension_upload = $infosfichier['extension'];
    $extension_upload = strtolower($extension_upload);
    $extensions_autorisees = array('mp4','ogg','webm');


      if (!in_array($extension_upload, $extensions_autorisees))
       exit($eror1="<div style='color:red;margin-bottom:30px;'>Erreur! Veuillez inserer une video svp (extensions autorisées: mp4, ogg, webm)</div>");

       $pic=$apogee.'.'.$extension_upload;
     if ($_FILES['vido']['size'] >= 1000000000){
      exit("Erreur, le fichier est volumineux");
    }
    $nom_video=$apogee.'.'.$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_video)){
    exit("Problem dans le telechargement de la video, Ressayez");
    }
    $vid_name=$nom_video;

  $requette="UPDATE `etudiant` SET `video`='$vid_name' WHERE `apogee`=$apogee";
  $r=mysqli_query($link,$requette);}
?>
  <script type="text/javascript">window.location.href="modifier_cv2.php";</script>
 