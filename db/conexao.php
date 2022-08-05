<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblia";

$pdo = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
?>