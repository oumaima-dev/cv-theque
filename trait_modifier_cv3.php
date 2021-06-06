<?php 

include ("connexion.php");
ob_start();
session_start();
$apogee=$_SESSION['apogee'];
$requete1="DELETE  from avoir_compet1 where apogee=$apogee";
 $r1=mysqli_query($link,$requete1);
$requete2="DELETE  from avoir_compet2 where apogee=$apogee";
 $r2=mysqli_query($link,$requete2);
 $requete3="DELETE  from avoir_compet3 where apogee=$apogee";
 $r3=mysqli_query($link,$requete3);
 $requete4="DELETE from parler where apogee=$apogee";
 $r4=mysqli_query($link,$requete4);
if (isset($_POST["bureau"])){
$bureau=$_POST["bureau"];
foreach ($bureau as $value) {
	$sql1="SELECT id1 from bureautique where b='$value'";
	$r1=mysqli_query($link,$sql1);
	$d1=mysqli_fetch_assoc($r1);
	$v1=$d1['id1'];
	$sql11="INSERT INTO `avoir_compet1` (`apogee`, `id1`) VALUES ($apogee,$v1)";
	$r11=mysqli_query($link,$sql11);
}}

if (isset($_POST["info"])){
$info=$_POST["info"];
foreach ($info as $value) {
	$sql2="SELECT  id2 from lang_info where linfo='$value'";
	$r2=mysqli_query($link,$sql2);
	$d2=mysqli_fetch_assoc($r2);
	$v2=$d2['id2'];
	$sql22="INSERT INTO `avoir_compet2` (`apogee`, `id2`) VALUES ('$apogee','$v2')";
	$r22=mysqli_query($link,$sql22);
}}

if (isset($_POST["sys_exp"])){
$sys_exp=$_POST["sys_exp"];
foreach ($sys_exp as $value) {
	$sql3="SELECT  id3 from sys_exploitation where sys_ex='$value'";
	$r3=mysqli_query($link,$sql3);
	$d3=mysqli_fetch_assoc($r3);
	$v3=$d3['id3'];
	$sql33="INSERT INTO `avoir_compet3` (`apogee`, `id3`) VALUES ('$apogee','$v3')";
	$r33=mysqli_query($link,$sql33);
}}

 if (isset($_POST["langues"])){
$langues=$_POST["langues"];
foreach ($langues as $value) {
	$sql4="SELECT  id4 from langues where lang='$value'";
	$r4=mysqli_query($link,$sql4);
	$d4=mysqli_fetch_assoc($r4);
	$v4=$d4['id4'];
	$sql44="INSERT INTO `parler` (`apogee`, `id4`) VALUES ('$apogee','$v4')";
	$r44=mysqli_query($link,$sql44);

}}
?>

<script type="text/javascript">
	window.location.href="cv.php";
</script>
