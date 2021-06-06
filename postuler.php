<?php include('connexion.php');
session_start();
$id_offre=$_POST['postuler'];
$apogee=$_SESSION['apogee'];
$sql99="INSERT INTO `postuler`(`apogee`, `id6`) VALUES ($apogee,$id_offre)";
$r9=mysqli_query($link,$sql99);
header('Location: mesOffres.php');
?>