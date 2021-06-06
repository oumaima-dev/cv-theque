<?php
include("connexion.php");
session_start();
$apogee=$_SESSION['apogee'];
$id=$_POST['delete1'];
$date=$_POST['date_obtention'];
$sql="DELETE FROM `obtenir` WHERE `id0`=$id and apogee=$apogee and date_obtention=$date";
$r=mysqli_query($link,$sql);
$sql1="DELETE FROM `diplome` WHERE `id0`=$id";
$r1=mysqli_query($link,$sql1);?>
<script type="text/javascript">window.location.href="modifier_cv2.php";</script>
