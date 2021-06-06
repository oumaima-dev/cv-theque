<?php
session_start();
unset($_SESSION['nom']);
unset($_SESSION['code']);
header("Location: index.php");
?>