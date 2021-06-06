<?php
include("connexion.php");
session_start();

$apogee=$_SESSION['apogee'];
$nom_dipl=addslashes($_POST['diplome']);
$etablissement=addslashes($_POST['etab']);
$date=$_POST['date_obtention'];
$sql4="INSERT into diplome (nom,etablissement) VALUES ('$nom_dipl','$etablissement')";
$result4=mysqli_query($link,$sql4);
if ($result4!=true) { echo 'echec de l\'enregistrement';
}
$sql5="SELECT id0 from diplome where nom='".$nom_dipl."' and etablissement='".$etablissement."'";
$result5=mysqli_query($link,$sql5);
$donnee2=mysqli_fetch_assoc($result5);
$id0=$donnee2['id0'];
$sql6="INSERT into obtenir VALUES ('$id0','$apogee','$date')";
$result6=mysqli_query($link,$sql6);?>

<script type="text/javascript">window.location.href="modifier_cv2.php";</script>

