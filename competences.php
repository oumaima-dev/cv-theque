<!DOCTYPE html>
<html>
<head>
	<title>Competences</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	

</head>
<body class="container">
<h1  align="center">compétences</h1>
 <form  action="traitement-competences.php" method="POST">

 	<label>Bureautique</label><br>
 	<input type="checkbox" name="bureau[]" value="Word"> Word<br>
 	<input type="checkbox" name="bureau[]" value="Excel"> Excel<br>
 	<input type="checkbox" name="bureau[]" value="PowerPoint"> Power Point<br>
 	<input type="checkbox" name="bureau[]" value="Access"> Access<br>
 	

 	<label>Langages Informatiques</label><br>
 	<input type="checkbox" name="info[]" value="Java"> Java<br>
 	<input type="checkbox" name="info[]" value="Javascript"> Java script<br>
 	<input type="checkbox" name="info[]" value="PHP"> PHP<br> 
 	<input type="checkbox" name="info[]" value="C"> C, C++<br>
 	<input type="checkbox" name="info[]" value="Python"> Python<br>
 	<input type="checkbox" name="info[]" value="Pascal"> Pascal<br>
 	
 	
 	<label>Systèmes d'exploitation</label><br>
 	<input type="checkbox" name="sys_exp[]" value="Windows"> Windows<br>
 	<input type="checkbox" name="sys_exp[]" value="MAC-OS"> MAC-OS<br>
 	<input type="checkbox" name="sys_exp[]" value="Linux"> Linux<br>


 	<label>Langues: </label><br>
 	<input type="checkbox" name="langues[]" value="Arabe">Arabe<br>
 	<input type="checkbox" name="langues[]" value="Francais">Francais<br>
 	<input type="checkbox" name="langues[]" value="Anglais">Anglais<br>
 	<input type="checkbox" name="langues[]" value="Espagnol">Espagnol<br>
 	<input type="checkbox" name="langues[]" value="Allemand">Allemand<br>
 	<input type="checkbox" name="langues[]" value="Mandarin">Mandarin<br>

 <br> 
 <input type="submit" name="submit">

 </form>
</body>
</html>