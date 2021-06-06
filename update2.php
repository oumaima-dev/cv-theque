<?php
include("connexion.php");
session_start();
$apogee=$_SESSION['apogee'];
$position=addslashes($_POST['position']);
$organisme= addslashes($_POST['organisme']) ; 
$d1=$_POST['date_debut'];
$d11=explode('/', $d1);
    ksort($d11);
    $dated=implode('-', $d11);
$d2=$_POST['date_fin'];
$d22=explode('/', $d2);
    ksort($d22);
    $datef=implode('-', $d22);
$id=$_POST['update2'];
$sql="UPDATE `expre_prof` SET `position`='$position',`organisme`='$organisme', `date_debut`='".$dated."', `date_fin`='".$datef."' WHERE `id5`=$id";
$r=mysqli_query($link,$sql);
?>
 <script type="text/javascript">window.location.href="modifier_cv2.php";</script>
