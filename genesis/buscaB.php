<?php
require('../conexao.php');

$texto_pesquisa =  $_GET['pesquisa'];

$conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM `versiculos` JOIN livros WHERE liv_id = ver_liv_id and `ver_vrs_id` = '1' and `ver_texto` LIKE ? ");
$stmt->execute(array('%' . $texto_pesquisa . '%'));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$busca_texto = $result['ver_texto'];
$livro = $result['liv_nome'];
$capitulo = $result['ver_capitulo'];
$versiculo = $result['ver_versiculo'];

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/estiloprincipal.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/estilo-gn.css" />

    <title>Biblia de Estudo Online</title>


</head>

<body>
    <header>
        <div class="cabecalho">
            <a href="../index.html"> <img src="../img/cruz-a-tinta.png" /></a>
            <em>Biblia de Estudo Online</em>
        </div>
    </header>
    <nav class="navCurta">

        <ul class="ferramentas">
            <li><a href="comentario/gn1-1_cmt.html" title="Comentário Bíblico">COMENTARIO</a></li>
            <li><a href="interlinear/gn1-1_int.html" title="Português - Grego/Hebraico interlinear">INTERLINEAR</a></li>
            <li><a href="#" title="Dicionário Bíblico">DICIONARIO</a></li>
            <li><a href="cruzadas/gn1-1_crz.html" title="Referências Cruzadas">CRUZADAS</a></li>
        </ul>


        <div class="menu-bar mobile">
            <ul>

                <li><a href="#">Ferramentas</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="#">Comentario</a></li>
                            <li><a href="#">Interlinear</a></li>
                            <li><a href="#">Dicionario</a></li>
                            <li><a href="#">Cruzadas</a>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Versoes</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="NVI/gn1_nvi.html">NVI</a></li>
                            <li><a href="#">ACF</a></li>
                            <li><a href="NTLH/gn1_ntlh.html">NTLH</a></li>
                        </ul>
                    </div>
            </ul>

        </div>
    </nav>
    <?php
    require('../conexao.php');

    ?>
    <div class="breadscrumbs">


        <a href="javascript:history.back()" title="Pagina inicial"><i class='bx bx-arrow-back'>Voltar</i></a>

    </div>


    <div id="corpo">
        <?php
       
            echo "<h1 style = 'margin: 20px 16px'>Resultado da Busca por '$texto_pesquisa'</h1> ";
            /*       echo iconv('UTF-8', 'ISO-8859-1',"<h3>Versão: Almeida Revisada e Atualizada</h3>"); */
            echo "<br>";
            $in = 'gn2.php?';
            $l = $result['ver_liv_id'];
            $c =  $result['ver_capitulo'];
            $v =  $result['ver_vrs_id'];
            if ($l != null) {
                echo '<a href=' . $in . 'livro=' . $l . '&' . 'mcapitulo=' . $c . '&' . 'versaoLv=' . $v . '>' . '<p id="lv" class="bresult">' . '<strong>' . $result['liv_nome'] . ' ' . $result['ver_capitulo'] . ':' . $result['ver_versiculo'] . '</strong>' .  ' ' . $result['ver_texto'] . '</p>' . '</a>' . '<br>';

                foreach ($stmt->fetchAll() as $k) {;
                    echo '<a href=' . $in . 'livro=' . $k['ver_liv_id'] . '&' . 'mcapitulo=' . $k['ver_capitulo'] . '&' . 'versaoLv=' . $k['ver_vrs_id'] . '>' . '<p id="lv" class="bresult">' . '<strong>' . $k['liv_nome'] . ' ' . $k['ver_capitulo'] . ': ' . $k['ver_versiculo'] . '</strong>' .  ' ' . $k['ver_texto'] . '</p>' . '</a>' . '<br>';
                }
            } else {
                $msg = "<h2 style = 'margin: 20px 16px'>Nada encontrado na versão ARA com os termos usados</h2>";
                echo iconv('UTF-8', 'ISO-8859-1', $msg);
            }
        
        ?>


    </div>

    <!--   <div class="setas">
        
         <a href="javascript:location.href=this.value"><i class='bx bx-left-arrow'></i></a>
        
        <a href="../genesis/gn2_acf.html"><i class='bx bx-right-arrow'></i></a>
    </div> -->
    <footer id="rodape" class="margem100">
        &copy; &shy;Biblia de Estudo Online
    </footer>

    <script src="../js/busca.js"></script>

</body>

</html>