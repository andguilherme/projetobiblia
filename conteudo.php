<<<<<<< HEAD
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
=======
<<<<<<< HEAD
<?php 

/* $livro = $_GET['livro'];
$capitulo = $_GET['capitulo'];
$vers = $_GET['vers'];

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
    
=======
<?php 

/* $livro = $_GET['livro'];
$capitulo = $_GET['capitulo'];
$vers = $_GET['vers'];

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
    
>>>>>>> 878c6f277bbf0a424309562c48617547c5431ecf
>>>>>>> 33abe737bc8cca442d87cfa581ea5758252b6611
    ?>