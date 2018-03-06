<?php

session_start();

$connect = new PDO("mysql:dbname=survey_senac;host=localhost", "root", "");
$connect->exec("set names utf8");

?>
