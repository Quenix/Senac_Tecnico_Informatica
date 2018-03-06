<?php

session_start();

unset($_SESSION['login']);
$_SESSION['error'] =  "<div class='alert alert-success text-center text-uppercase'>Você deslogou com sucesso! </div>";
header("location:admin.php");

?>