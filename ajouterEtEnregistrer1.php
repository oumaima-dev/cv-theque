<?php
include("connexion.php");
session_start();

$apogee=$_SESSION['apogee'];
$nom_dipl=addslashes($_POST['diplome']);
$etablissement=addslashes($_POST['etab']);
$d1=$_POST['date_obtention'];

$d2=explode('/', $d1);
ksort($d2);
$date_obtention=implode('-', $d2);

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

header("Location:form2.php");

?>