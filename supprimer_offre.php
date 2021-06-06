<?php session_start();
if(isset($_POST['poa']))
  {$id6=$_SESSION['id6'];
    include("connexion.php");
   $sql88="delete FROM `offre` WHERE `id6`='".$id6."'";
  $r88=mysqli_query($link,$sql88);
  if($r88!=false){header("Location:mesoffres1.php");}}?>