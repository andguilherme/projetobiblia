<<<<<<< HEAD
<?php
ini_set('default_charset', 'iso-8859-1');
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblia";

//$pdo = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
try{
   $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "Banco conectado com sucesso!"; 
}catch(PDOException $erro){
    echo "Falha ao se conectar com o banco! ";
}



=======
<?php
ini_set('default_charset', 'iso-8859-1');
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblia";

//$pdo = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
try{
   $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   //echo "Banco conectado com sucesso!"; 
}catch(PDOException $erro){
    echo "Falha ao se conectar com o banco! ";
}



>>>>>>> 33abe737bc8cca442d87cfa581ea5758252b6611
?>