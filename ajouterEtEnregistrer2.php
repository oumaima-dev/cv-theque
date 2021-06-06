<?php
include("connexion.php");
session_start();

$apogee=$_SESSION['apogee'];
$position=addslashes($_POST['position']);
$organisme=addslashes($_POST['organisme']);
$dd1=$_POST['date_debut'];
$df1=$_POST['date_fin'];

$dd2=explode('/', $dd1);
ksort($dd2);
$date_debut=implode('-', $dd2);

$df2=explode('/', $df1);
ksort($df2);
$date_fin=implode('-', $df2);

$sql1="INSERT into expre_prof(position,organisme,date_debut,date_fin) VALUES ('$position','$organisme','$date_debut','$date_fin')";
$result1=mysqli_query($link,$sql1);
if ($result1!=true) { echo 'echec de l\'enregistrement';
}
$sql2="SELECT id5 from expre_prof where position='".$position."' and organisme='".$organisme."' and date_debut='".$date_debut."' and date_fin='".$date_fin."'";
$result2=mysqli_query($link,$sql2);
$donnee1=mysqli_fetch_assoc($result2);
$id5=$donnee1['id5'];
$sql3="INSERT into avoir_exp VALUES ('$apogee','$id5')";
$result3=mysqli_query($link,$sql3);

header("Location:form2.php")
?>