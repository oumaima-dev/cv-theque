<?php
include("connexion.php");
session_start();
$apogee=$_SESSION['apogee'];
$position=addslashes($_POST['position']);
$organisme=addslashes($_POST['organisme']) ; 
$d1=$_POST['date_debut'];
$d11=explode('/', $d1);
    ksort($d11);
    $dated=implode('-', $d11);
$d2=$_POST['date_fin'];
$d22=explode('/', $d2);
    ksort($d22);
    $datef=implode('-', $d22);
$sql4="INSERT into expre_prof (position,organisme,date_debut,date_fin) VALUES ('$position','$organisme','$dated','$datef')";
$result4=mysqli_query($link,$sql4);
$sql5="SELECT id5 from expre_prof where `position`='$position'and `organisme`='$organisme' and `date_debut`='".$dated."' and `date_fin`='".$datef."'";
$result5=mysqli_query($link,$sql5);
$donnee2=mysqli_fetch_assoc($result5);
$id5=$donnee2['id5'];
$sql6="INSERT INTO `avoir_exp`(`apogee`, `id5`)VALUES ($apogee,$id5)";
$result6=mysqli_query($link,$sql6);?>
 <script type="text/javascript">window.location.href="modifier_cv2.php";</script>

