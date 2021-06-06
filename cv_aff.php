<?php include("connexion.php");
session_start();
$apogee=$_SESSION['apogee'];
$r1="select * from etudiant where apogee='".$apogee."'";
$f1=mysqli_query($link,$r1);
$d1=mysqli_fetch_assoc($f1);
echo $d1['nom']."<br>" ;
echo $d1['prenom']."<br>";
echo $d1['email']."<br>";
echo $d1['tel']."<br>";
echo $d1['date_naissance']."<br>";
echo $d1['filiere']."<br>";
?>
<?php include("connexion.php");
$r2="select nom,etablissement,date_obtention from diplome,obtenir where obtenir.id0=diplome.id0 and apogee='".$apogee."'";
$f2=mysqli_query($link,$r2);
while ($d2=mysqli_fetch_assoc($f2)) {
echo $d2['nom']."<br>";
echo $d2['etablissement']."<br>";
echo $d2['date_obtention']."<br>";
}

?>
<?php include("connexion.php");
$r3="select position ,organisme,date_debut,date_fin from expre_prof,avoir_exp ,etudiant where expre_prof.id5 =avoir_exp.id5 and etudiant.apogee='".$apogee."'";
$f3=mysqli_query($link,$r3);
while($d3=mysqli_fetch_assoc($f3)){
echo $d3['position']."<br>";
echo $d3['organisme']."<br>";
echo $d3['date_debut']."<br>";
echo $d3['date_fin']."<br>";}
?>

<?php include("connexion.php");
$r4="select distinct b from bureautique,avoir_compet1,etudiant where etudiant.apogee=avoir_compet1.apogee  and bureautique.id1=avoir_compet1.id1 and etudiant.apogee='".$apogee."'";
$f4=mysqli_query($link,$r4);
while($d4=mysqli_fetch_assoc($f4))
{echo $d4['b']."<br>";	
}

?>
<?php include("connexion.php");
$r5="select  linfo from lang_info,avoir_compet2,etudiant where  etudiant.apogee=avoir_compet2.apogee and lang_info.id2=avoir_compet2.id2 and etudiant.apogee='".$apogee."'";
$f5=mysqli_query($link,$r5);
while($d5=mysqli_fetch_assoc($f5))
{echo $d5['linfo']."<br>";
}

?>
<?php include("connexion.php");
$r6="select  lang from langues, parler,etudiant where etudiant.apogee=parler.apogee and parler.id4=langues.id4 and etudiant.apogee='".$apogee."'";
$f6=mysqli_query($link,$r6);
while($d6=mysqli_fetch_assoc($f6))
    {echo $d6['lang']."<br>";}
?>

<?php include("connexion.php");
$r7="select sys_ex from sys_exploitation,avoir_compet3,etudiant where etudiant.apogee=avoir_compet3.apogee  and sys_exploitation.id3 =avoir_compet3.id3 and etudiant.apogee='".$apogee."'";
$f7=mysqli_query($link,$r7);
while($d7=mysqli_fetch_assoc($f7))
    {echo $d7['sys_ex']."<br>";}
?>