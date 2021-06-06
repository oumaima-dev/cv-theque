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

$nom_dipl=addslashes($_POST['diplome']);
$etablissement=addslashes($_POST['etab']);
$d1=$_POST['date_obtention'];

$d2=explode('/', $d1);
ksort($d2);
$date_obtention=implode('-', $d2);

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


$sql4="INSERT into diplome(nom,etablissement) VALUES ('$nom_dipl','$etablissement')";
$result4=mysqli_query($link,$sql4);
if ($result4!=true) { echo 'echec de l\'enregistrement';
}
$sql4="SELECT id0 from diplome where nom='".$nom_dipl."' and etablissement='".$etablissement."'";
$result4=mysqli_query($link,$sql4);
$donnee2=mysqli_fetch_assoc($result4);
$id0=$donnee2['id0'];
$sql5="INSERT into obtenir VALUES ('$id0','$apogee','$date_obtention')";
$result5=mysqli_query($link,$sql5);

header("Location: form3.php")
?>