<?php
session_start();
unset($_SESSION['apogee']);
unset($_SESSION['prenom']);
header("Location: index.php");
?>