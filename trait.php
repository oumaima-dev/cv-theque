<?php
session_start();
ob_start();
    $apoge=$_SESSION['apogee'];$prenom=$_SESSION['prenom'];
  include("connexion.php");
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
       exit($eror1="<div style='color:red;margin-bottom:30px;'>Erreur! Veuillez inserer une image svp (extensions autorisées: png, jpeg , jpg)</div>");

       $pic=$apoge.'.'.$extension_upload;

      if ($_FILES['photo']['size'] >= 1000000){
        exit($eror2="<div style='color:red;margin-bottom:30px;'>Erreur! le fichier est volumineux </div>") ;}
        if(!move_uploaded_file($temp_name, $dossier.$pic) ){exit($eror3="<div style='color:red;margin-bottom:30px;'>Erreur!  probleme dans le telechargement </div>") ; }
    
    $sql2="UPDATE etudiant set tel=$tel,date_naissance='$naiss',filiere='$file',adresse='$adr',photo='$pic'  where apogee='".$apoge."'";
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
     if ($_FILES['vido']['size'] >= 1000000000){
      exit("Erreur, le fichier est volumineux");
    }
    $nom_video=$apoge.'.'.$extension_upload;
    if(!move_uploaded_file($temp_name,$dossier.$nom_video)){
    exit("Problem dans le telechargement de la video, Ressayez");
    }
    $vid_name=$nom_video;

  $requette="UPDATE `etudiant` SET `video`='$vid_name' WHERE `apogee`=$apoge";
  $r=mysqli_query($link,$requette);}

  header('location:form2.php');
 ob_end_flush();
  
?>