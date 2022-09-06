<?php

require('conexao.php');



$livro = $_POST['livro'];

$capitulo = $_POST['mcapitulo'];

$vers=1;



//$sql = $pdo->prepare("SELECT ver_texto from versiculos WHERE ver_vrs_id=? AND ver_livro=? AND ver_capitulo=? ");

//$sql->execute(array($vers, $livro, $capitulo));



echo "<table style='border: solid 1px black;'>";

 echo "<tr><th>Versão</th><th>Livro</th><th>Capítulo</th></tr>";


class TableRows extends RecursiveIteratorIterator {

    function __construct($it) {

        parent::__construct($it, self::LEAVES_ONLY);

    }

    function current() {

        return "<td style='width: 550px; border: 1px solid black;'>" . parent::current(). "</td>";

    }

    function beginChildren() {

        echo "<tr>";

    }

    function endChildren() {

        echo "</tr>" . "\n";

    }

}


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT ver_texto from versiculos WHERE ver_vrs_id=? AND ver_liv_id=? AND ver_capitulo=?");

    $stmt->execute(array($vers, $livro, $capitulo));



    // set the resulting array to associative

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);



    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {

        echo $v;

    }

}

catch(PDOException $e) {

    echo "Error: " . $e->getMessage();

}

$conn = null;





?>