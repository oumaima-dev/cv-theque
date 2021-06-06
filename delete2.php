<?php
include("connexion.php");
session_start();
$apogee=$_SESSION['apogee'];
$id=$_POST['delete2'];
$sql="DELETE FROM `avoir_exp` WHERE `id5`=$id and apogee=$apogee";
$r=mysqli_query($link,$sql);
$sql1="DELETE FROM `expre_prof` WHERE `id5`=$id";
$r1=mysqli_query($link,$sql1);?>
<script type="text/javascript">window.location.href="modifier_cv2.php";</script>
