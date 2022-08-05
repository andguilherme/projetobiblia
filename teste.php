<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estiloprincipal.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Document</title>

</head>

<body>
    <header>

        <div class="cabecalho">
            <a href="../index.html"> <img src="img/cruz-a-tinta.png" /></a>
            <em>Bíblia de Estudo Online</em>
        </div>
    </header>
    <nav>

        <ul class="versoes">
            <li><a href="NVI/gn1_nvi.html" title="Nova Versão Internacional">NVI</a></li>
            <li><a href="#" title="Almeida Corrigida e Fiel">ACF</a></li>
            <li><a href="NTLH/gn1_ntlh.html" title="Nova Tradução da Linguagem de Hoje">NTLH</a></li>
        </ul>
        <ul class="ferramentas">
            <li><a href="comentario/gn1-1_cmt.html" title="Comentário Bíblico">COMENTÁRIO</a></li>
            <li><a href="interlinear/gn1-1_int.html" title="Português - Grego/Hebraico interlinear">INTERLINEAR</a></li>
            <li><a href="#" title="Dicionário Bíblico">DICIONÁRIO</a></li>
            <li><a href="cruzadas/gn1-1_crz.html" title="Referências Cruzadas">CRUZADAS</a></li>
        </ul>

        <input type="search" name="pesquisa" id="busca" placeholder="Busca na Bíblia" onsearch="minhabusca()" />

        <div class="menu-bar mobile">
            <ul>

                <li><a href="#">Ferramentas</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="comentario/gn1-1_cmt.html">Comentário</a></li>
                            <li><a href="interlinear/gn1-1_int.html">Interlinear</a></li>
                            <li><a href="#">Dicionário</a></li>
                            <li><a href="cruzadas/gn1-1_crz.html">Cruzadas</a>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Versões</a>
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
    require('conexao.php');
    //$sql = $pdo->prepare("SELECT ver_texto from versiculos WHERE ver_vrs_id=? AND ver_livro=? AND ver_capitulo=? ");
    //$sql->execute(array($vers, $livro, $capitulo));
    include('conteudo.php');


    ?>
    <div class="breadscrumbs">
        <a href="index.html">Bíblia</a> &shy; > <a href="#">ACF</a>
        <span style="color: #606060">&shy; > <?php echo $titulo_livro ?> &shy;</span>
    </div>

    <div class="sel_livros">
        <form method="post" action="">

            <select name="livro" id="tst">
                <optgroup label="Antigo Testamento">

                    <option value="1">Gênesis</option>
                    <option value="2">Êxodo</option>
                    <option value="3">Levítico</option>
                    <option value="4">Números</option>
                    <option value="5">Deuteronômio</option>
                    <option value="6">Josué</option>
                    <option value="7">Juízes</option>
                    <option value="8">Rute</option>
                    <option value="9">1 Samuel</option>
                    <option value="10">2 Samuel</option>
                    <option value="11">1 Reis</option>
                    <option value="12">2 Reis</option>
                    <option value="13">1 Crônicas</option>
                    <option value="14">2 Crônicas</option>
                    <option value="15">Esdras</option>
                    <option value="16">Neemias</option>
                    <option value="17">Ester</option>
                    <option value="18">Jó</option>
                    <option value="19">Salmos</option>
                    <option value="20">Provérbios</option>
                    <option value="21">Eclesiastes</option>
                    <option value="22">Cantares</option>
                    <option value="23">Isaías</option>
                    <option value="24">Jeremias</option>
                    <option value="25">Lamentações</option>
                    <option value="26">Ezequiel</option>
                    <option value="27">Daniel</option>
                    <option value="28">Oséias</option>
                    <option value="29">Joel</option>
                    <option value="30">Amós</option>
                    <option value="31">Obadias</option>
                    <option value="31">Jonas</option>
                    <option value="31">Miquéias</option>
                    <option value="34">Naum</option>
                    <option value="35">Habacuque</option>
                    <option value="36">Sofonias</option>
                    <option value="37">Ageu</option>
                    <option value="38">Zacarias</option>
                    <option value="39">Malaquias</option>
            </select>

            <select name="mcapitulo" id="icap">
                <!-- <option value="1">1</option> -->
                <?php

                for ($i = 1; $i <= $qtd; $i++) {
                    echo "<option value='$i'>$i</option>" . '<br>';
                }
                ?>

            </select>
            <input type="submit" value="Selecionar" style="width: 90px;">
        </form>


        <!-- <iframe id="vcap" src=" "  width="100%" height="60%"></iframe> -->
        <!-- <br> -->

        <?php

        echo " <h1>$titulo_livro $capitulo </h1>";
        echo '<hr>';
        echo '<p id="gn">' . '<strong>' . $result['ver_versiculo'] . '</strong>' . ' ' . $result['ver_texto'] . '</p>' . '<br>';

        foreach ($stmt->fetchAll() as $k) {
            echo '<p id="gn">' . '<strong>' . $k['ver_versiculo'] . '</strong>' . ' ' . $k['ver_texto'] . '</p>' . '<br>';
        }


        ?>
        <!-- <p id="gn"><strong>1</strong> <?php echo  $v ?> <a id="mr" href="#" title="Comentário Bíblico"><i class="far fa-comments"></i></a><a id="mr" href="#" title="Interlinear"><i class="fas fa-grip-lines"></i></a><a id="mr" href="cruzadas/gn1-1_crz.html" title="Referências cruzadas"><i class="fas fa-times"></i></a></p> -->

        </main>


    </div>
</body>

</html>