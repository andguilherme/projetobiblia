<?php 

/* $livro = $_POST['livro'];
$capitulo = $_POST['mcapitulo'];
$vers = 1;

$conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT ver_capitulo, ver_versiculo, ver_texto from versiculos WHERE ver_vrs_id=? AND ver_liv_id=? AND ver_capitulo=?");
$stmt->execute(array($vers, $livro, $capitulo)); 

// set the resulting array to associative
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$ver_num = $result['ver_versiculo'];

    $sql = $pdo->prepare("SELECT liv_nome, qt_cap FROM livros WHERE liv_id=? ");
    $sql->execute(array($livro));
    $dados = $sql->fetch(PDO::FETCH_ASSOC);
    $titulo_livro = $dados['liv_nome'];
    $qtd = $dados['qt_cap'];
       
    */
    var_dump($livro);
    ?>