<?php 
	session_start();
	
	if (isset($_POST['connexion'])) {
	include("connexion.php");

	$log="admin";
	$pass="123456";

	if ($_POST['login']==$log && $_POST['pass']==$pass) {
	
		$_SESSION['login']=$log;
		$_SESSION['pass']=$pass;
		header("Location:accueil_administrateur.php");
}
	else
		{ $ereur="Veuillez saisir un login et un mot de passe correct";}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>admin</title>
</head>
<body>
	<style type="text/css">
		label{font-weight: bold;}
		button{background-color: #1C1C1C;color: white;}

	</style>


 	<form method="POST" class="container mt-5 card" style="width: 550px;background-color: #DDDBAF;">
 		<h4 class="pt-3" style="color: #1C797E;text-align: center;font-weight: bold;">CONNEXION</h4>
 		<div class="">
 	<div class="form-group row mt-4 ml-5">
        <label class="col-md-3 col-form-label " >login </label>
        <div class="col-md-6">
            <input type="text" name="login" class="form-control" required>
        </div>
    </div>
    <div class="form-group row ml-5">
        <label class="col-md-3 col-form-label">Password </label>
        <div class="col-md-6">
            <input type="password" name="pass" class="form-control" required>
        </div>
    </div> 
    <div class=" col-md-6 "> 
    <button  type="submit" class="btn  mb-3 ml-5" name="connexion" >Se connecter</button>  
	</div>
	<div class="ml-5" style="color: red;">
	<?php if (isset($_POST['connexion'])) {
		if (isset($ereur)) {
		echo $ereur;
	}
	} ?></div><br>
	</div>
 	</form>

</body>
</html>