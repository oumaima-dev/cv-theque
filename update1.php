<?php
include("connexion.php");
session_start();
$apogee=$_SESSION['apogee'];
$nom=$_POST['diplome'];
$etab=$_POST['etab'];
$date=$_POST['date_obtention'];
$id=$_POST['update1'];
$sql="UPDATE `diplome` SET `nom`='$nom',`etablissement`='$etab' WHERE `id0`=$id";
$sql2="UPDATE obtenir set date_obtention=$date where id0=$id and apogee=$apogee";
$r=mysqli_query($link,$sql);
$r2=mysqli_query($link,$sql2);
?>
 <script type="text/javascript">window.location.href="modifier_cv2.php";</script>