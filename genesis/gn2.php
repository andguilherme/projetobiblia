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
    <!-- <script>
        function lvr() {
            var select = document.getElementById('tst');
            var b = select.options[select.selectedIndex].value;
            window.location.href = (b);
        }

        function cpt() {
            var select = document.getElementById('icap');
            var b = select.options[select.selectedIndex].value;
            window.location.href = (b);
        }
    </script> -->

</head>

<body>
    <header>
        <div class="cabecalho">
            <a href="../index.html"> <img src="../img/cruz-a-tinta.png" /></a>
            <em><?php echo iconv('UTF-8', 'ISO-8859-1', 'Bíblia'); ?> de Estudo Online</em>
        </div>
    </header>
    <nav>
        <!--  <ul class="versoes">
            <li><a href="gn2.php?livro=<?php echo $_GET['livro'] ?>&mcapitulo=<?php echo $_GET['mcapitulo'] ?>&versaoLv=5" title="Nova Tradução da Linguagem de Hoje">NTLH</a></li>
            <li><a href="gn2.php?livro=<?php echo $_GET['livro'] ?>&mcapitulo=<?php echo $_GET['mcapitulo'] ?>&versaoLv=1" title="Almeida Revista e Atualizada">ARA</a></li>
            <li><a href="gn2.php?livro=<?php echo $_GET['livro'] ?>&mcapitulo=<?php echo $_GET['mcapitulo'] ?>&versaoLv=6" title="Nova Versão Internacional">NVI</a></li>
        </ul> -->
        <ul class="ferramentas">
            <li><a href="comentario/gn1-1_cmt.html" title="Comentario Biblico"><?php echo iconv('UTF-8', 'ISO-8859-1', 'COMENTÁRIO'); ?> </a></li>
            <li><a href="interlinear/gn1-1_int.html" title="Português - Grego/Hebraico interlinear">INTERLINEAR</a></li>
            <li><a href="#" title="Dicionario Biblico"><?php echo iconv('UTF-8', 'ISO-8859-1', 'DICIONÁRIO'); ?></a></li>
            <li><a href="cruzadas/gn1-1_crz.html" title="Referencias Cruzadas">CRUZADAS</a></li>
        </ul>

        <input type="search" name="pesquisa" id="busca" placeholder="Busca na Biblia" onsearch="minhabusca()" />

        <div class="menu-bar mobile">
            <ul>

                <li><a href="#">Ferramentas</a>
                    <div class="sub-menu-1">
                        <ul>
                            <li><a href="comentario/gn1-1_cmt.html">Comentario</a></li>
                            <li><a href="interlinear/gn1-1_int.html">Interlinear</a></li>
                            <li><a href="#">Dicionario</a></li>
                            <li><a href="cruzadas/gn1-1_crz.html">Cruzadas</a>
                            
                        </ul>
                        
                    </div>
                </li>
                <li><a href="#">Versoes</a>
                    <div class="sub-menu-1">
                        <ul>
                        <li><a href="gn2.php?livro=<?php echo $_GET['livro'] ?>&mcapitulo=<?php echo $_GET['mcapitulo'] ?>&versaoLv=5" title="Nova Tradução da Linguagem de Hoje">NTLH</a></li>
                        <li><a href="gn2.php?livro=<?php echo $_GET['livro'] ?>&mcapitulo=<?php echo $_GET['mcapitulo'] ?>&versaoLv=1" title="Almeida Revista e Atualizada">ARA</a></li>
                         <li><a href="gn2.php?livro=<?php echo $_GET['livro'] ?>&mcapitulo=<?php echo $_GET['mcapitulo'] ?>&versaoLv=6" title="Nova Versão Internacional">NVI</a></li>
                        </ul>
                    </div>
                <!-- <li><input type="search" name="pesquisa" id="busca-mobile" placeholder="Busca na Biblia" onsearch="minhabusca()" style="display: none" /></li> -->
            </ul>

        </div>
    </nav>
    <?php
    require('../conexao.php');

    ?>

    <div class="breadscrumbs">

        <!--   <a href="../index.html"> Biblia</a> &shy; > <a href="#" id="bcVrs"></a>
        <span style="color: #606060" id="nm">&shy;   &shy;</span> -->
        <a href="../index.html" title="Pagina inicial" style="width: 50px; height: 50px"><i class='bx bx-home'></i></a>

    </div>

    <div id="corpo">
        <div class="sel_livros selNova">
            <form method="GET" action="" name="livronome" id="livronome">

                <select name="livro" id="tst" onchange="this.form.submit()">
                    <?php
                    $livro = $_GET['livro'];
                    $capitulo = $_GET['mcapitulo'];
                    $vers = $_GET['versaoLv'];
                    $conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT ver_capitulo, ver_versiculo, ver_texto from versiculos WHERE ver_vrs_id=? AND ver_liv_id=? AND ver_capitulo=?");
                    $stmt->execute(array($vers, $livro, $capitulo));
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $ver_num = $result['ver_versiculo'];
                    $sql = $pdo->prepare("SELECT liv_nome, qt_cap FROM livros WHERE liv_id=? ");
                    $sql->execute(array($livro));
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);
                    $titulo_livro = $dados['liv_nome'];
                    $qtd = $dados['qt_cap'];
                    
                    ?>
                    <optgroup label="Antigo Testamento">
                        <option value="" style="text-align:center ;">Selecione um livro</option>
                        <option value="1" <?php if ($livro == '1') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Gênesis'); ?></option>
                        <option value="2" <?php if ($livro == '2') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Êxodo'); ?></option>
                        <option value="3" <?php if ($livro == '3') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Levítico');?></option>
                        <option value="4" <?php if ($livro == '4') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Números')?></option>
                        <option value="5" <?php if ($livro == '5') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Deuteronômio');?></option>
                        <option value="6" <?php if ($livro == '6') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Josué');?></option>
                        <option value="7" <?php if ($livro == '7') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Juízes'); ?></option>
                        <option value="8" <?php if ($livro == '8') echo "selected=\"selected\""; ?>>Rute</option>
                        <option value="9" <?php if ($livro == '9') echo "selected=\"selected\""; ?>>1 Samuel</option>
                        <option value="10" <?php if ($livro == '10') echo "selected=\"selected\""; ?>>2 Samuel</option>
                        <option value="11" <?php if ($livro == '11') echo "selected=\"selected\""; ?>>1 Reis</option>
                        <option value="12" <?php if ($livro == '12') echo "selected=\"selected\""; ?>>2 Reis</option>
                        <option value="13" <?php if ($livro == '13') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '1 Crônicas'); ?></option>
                        <option value="14" <?php if ($livro == '14') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '2 Crônicas'); ?></option>
                        <option value="15" <?php if ($livro == '15') echo "selected=\"selected\""; ?>>Esdras</option>
                        <option value="16" <?php if ($livro == '16') echo "selected=\"selected\""; ?>>Neemias</option>
                        <option value="17" <?php if ($livro == '17') echo "selected=\"selected\""; ?>>Ester</option>
                        <option value="18" <?php if ($livro == '18') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Jó'); ?></option>
                        <option value="19" <?php if ($livro == '19') echo "selected=\"selected\""; ?>>Salmos</option>
                        <option value="20" <?php if ($livro == '20') echo "selected=\"selected\""; ?>>Proverbios</option>
                        <option value="21" <?php if ($livro == '21') echo "selected=\"selected\""; ?>>Eclesiastes</option>
                        <option value="22" <?php if ($livro == '22') echo "selected=\"selected\""; ?>>Cantares</option>
                        <option value="23" <?php if ($livro == '23') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Isaías'); ?></option>
                        <option value="24" <?php if ($livro == '24') echo "selected=\"selected\""; ?>>Jeremias</option>
                        <option value="25" <?php if ($livro == '25') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Lamentações'); ?></option>
                        <option value="26" <?php if ($livro == '26') echo "selected=\"selected\""; ?>>Ezequiel</option>
                        <option value="27" <?php if ($livro == '27') echo "selected=\"selected\""; ?>>Daniel</option>
                        <option value="28" <?php if ($livro == '28') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Oséias'); ?></option>
                        <option value="29" <?php if ($livro == '29') echo "selected=\"selected\""; ?>>Joel</option>
                        <option value="30" <?php if ($livro == '30') echo "selected=\"selected\""; ?>>Amos</option>
                        <option value="31" <?php if ($livro == '31') echo "selected=\"selected\""; ?>>Obadias</option>
                        <option value="31" <?php if ($livro == '31') echo "selected=\"selected\""; ?>>Jonas</option>
                        <option value="31" <?php if ($livro == '31') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Miquéias'); ?></option>
                        <option value="34" <?php if ($livro == '34') echo "selected=\"selected\""; ?>>Naum</option>
                        <option value="35" <?php if ($livro == '35') echo "selected=\"selected\""; ?>>Habacuque</option>
                        <option value="36" <?php if ($livro == '36') echo "selected=\"selected\""; ?>>Sofonias</option>
                        <option value="37" <?php if ($livro == '37') echo "selected=\"selected\""; ?>>Ageu</option>
                        <option value="38" <?php if ($livro == '38') echo "selected=\"selected\""; ?>>Zacarias</option>
                        <option value="39" <?php if ($livro == '39') echo "selected=\"selected\""; ?>>Malaquias</option>
                    </optgroup>

                    <optgroup label="Novo Testamento">

                        <option value="40" <?php if ($livro == '40') echo "selected=\"selected\""; ?>>Mateus</option>
                        <option value="41" <?php if ($livro == '41') echo "selected=\"selected\""; ?>>Marcos</option>
                        <option value="42" <?php if ($livro == '42') echo "selected=\"selected\""; ?>>Lucas</option>
                        <option value="43" <?php if ($livro == '43') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'João');?></option>
                        <option value="44" <?php if ($livro == '44') echo "selected=\"selected\""; ?>>Atos</option>
                        <option value="45" <?php if ($livro == '45') echo "selected=\"selected\""; ?>>Romanos</option>
                        <option value="46" <?php if ($livro == '46') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '1 Coríntios'); ?></option>
                        <option value="47" <?php if ($livro == '47') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '2 Coríntios'); ?></option>
                        <option value="48" <?php if ($livro == '48') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Gálatas'); ?></option>
                        <option value="49" <?php if ($livro == '49') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', 'Efésios'); ?></option>
                        <option value="50" <?php if ($livro == '50') echo "selected=\"selected\""; ?>>Filipenses</option>
                        <option value="51" <?php if ($livro == '51') echo "selected=\"selected\""; ?>>Colossenses</option>
                        <option value="52" <?php if ($livro == '52') echo "selected=\"selected\""; ?>>1 Tessalonissences</option>
                        <option value="53" <?php if ($livro == '53') echo "selected=\"selected\""; ?>>1 Tessalonissences</option>
                        <option value="54" <?php if ($livro == '54') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '1 Timóteo'); ?></option>
                        <option value="55" <?php if ($livro == '55') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '2 Timóteo'); ?></option>
                        <option value="56" <?php if ($livro == '56') echo "selected=\"selected\""; ?>>Tito</option>
                        <option value="57" <?php if ($livro == '57') echo "selected=\"selected\""; ?>>Filemom</option>
                        <option value="58" <?php if ($livro == '58') echo "selected=\"selected\""; ?>>Hebreus</option>
                        <option value="59" <?php if ($livro == '59') echo "selected=\"selected\""; ?>>Tiago</option>
                        <option value="60" <?php if ($livro == '60') echo "selected=\"selected\""; ?>>1 Pedro</option>
                        <option value="61" <?php if ($livro == '61') echo "selected=\"selected\""; ?>>2 Pedro</option>
                        <option value="62" <?php if ($livro == '62') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '1 João'); ?></option>
                        <option value="63" <?php if ($livro == '63') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '2 João'); ?></option>
                        <option value="64" <?php if ($livro == '64') echo "selected=\"selected\""; ?>><?php echo iconv('UTF-8', 'ISO-8859-1', '3 João'); ?></option>
                        <option value="65" <?php if ($livro == '65') echo "selected=\"selected\""; ?>>Judas</option>
                        <option value="66" <?php if ($livro == '66') echo "selected=\"selected\""; ?>>Apocalipse</option>
                    </optgroup>
                </select>
                <!-- <input type="text" name="ccap" id="iccap" value="1" readonly/> -->
                <select name="mcapitulo" id="capitulo_geral" onchange="this.form.submit()">
                    <option value='1'>1</option>
                    <?php

                    $sql = $pdo->prepare("SELECT liv_nome, qt_cap FROM livros WHERE liv_id=? ");
                    $sql->execute(array($livro));
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);
                    $titulo_livro = $dados['liv_nome'];
                    $qtd = $dados['qt_cap'];


                    for ($i = 2; $i <= $qtd; $i++) {

                        echo "<option value='$i'>$i</option>" . '<br>';
                    }

                    ?>
                </select>
                <select name="versaoLv" id="versaoLv" onchange="this.form.submit()">
                    <option value="1" <?php if ($vers == '1') echo "selected=\"selected\""; ?>>Almeida Revista e Atualizada - ARA</option>
                    <option value="5" <?php if ($vers == '5') echo "selected=\"selected\""; ?>>Nova Traducao da Linguagem de Hoje - NTLH</option>
                    <option value="6" <?php if ($vers == '6') echo "selected=\"selected\""; ?>>Nova Versao Internacional - NVI</option>
                </select>
                <!-- <input type="submit" value="Selecionar" style="width: 90px; "> -->
            </form>
        </div>
        <!-- query para alteração do titulo da versão -->
        <?php
        $sql = $pdo->prepare("SELECT vrs_nome FROM versoes WHERE vrs_id=? ");
        $sql->execute(array($vers));
        $dado = $sql->fetch(PDO::FETCH_ASSOC);
        $nomeVersao = $dado['vrs_nome'];
        ?>
        <!-- Texto -->
        <br>
        <p class='tversao'><?php echo $nomeVersao ?> </p>

        <div class="textoLv">

            <p id='lv'></p>

            <?php

            echo "<h1>$titulo_livro $capitulo</h1>";
            echo '<hr>';
            echo '<p id="lv">' . '<strong>' . $result['ver_versiculo'] . '</strong>' . ' ' . $result['ver_texto'] . '</p>' . '<br>';

            foreach ($stmt->fetchAll() as $k) {
                echo '<p id="lv">' . '<strong>' . $k['ver_versiculo'] . '</strong>' . ' ' . $k['ver_texto'] . '</p>' . '<br>';
            }
            $cap = $_GET['mcapitulo'];
            $qtd = $dados['qt_cap'] ;
            $n = $capitulo + 1;
            $p = $capitulo - 1;
            ?>

        </div>
    </div>
    <div class="setas">
        <a href="<?php if ($cap>1){ echo "gn2.php?livro=$livro&mcapitulo=$p&versaoLv=$vers";} ?>"><i class='bx bx-left-arrow'></i></a>
        <a href="<?php if ($cap < $qtd) {echo "gn2.php?livro=$livro&mcapitulo=$n&versaoLv=$vers";} ?>"><i class='bx bx-right-arrow'></i></a>
    </div>
    <footer id="rodape">
        &copy; &shy;Projeto Biblia Online 
        <label style="margin-right: 2%;">andersonguilherme.com.br</label>
    </footer>
    <input type="button" value=&rarr; id="next" title="Proxima pagina">
    <input type="button" value=&larr; id="prev" title="Pagina anterior">

    <script>
        //script para igualar o select ao que esta sendo visualizado na tela
        text = <?php echo "$capitulo" . PHP_EOL; ?>
        select = document.querySelector('#capitulo_geral');
        t = document.querySelector('#capitulo_geral').length;
        if (text <= t) {
            select.value = text;
        } else {
            document.querySelector('.textoLv h1').textContent = '';
            select.value = '';
        }
        //function das setas
        var cap = <?php echo $_GET['mcapitulo'];?><?php echo PHP_EOL ?>
        var qtd = <?php echo $dados['qt_cap'] ;?><?php echo PHP_EOL ?>
        document.getElementById("next").onclick = function() {
            if (cap < qtd) {
            var n = <?php echo $n = $capitulo + 1; ?><?php echo PHP_EOL ?>
            window.location.href = (<?php echo "'gn2.php?livro=$livro&mcapitulo=$n&versaoLv=$vers'"; ?>);
            }
        }
        if (cap > 1) {
        document.getElementById("prev").onclick = function() {
            var p = <?php echo $p = $capitulo - 1; ?><?php echo PHP_EOL ?>
            window.location.href = (<?php echo "'gn2.php?livro=$livro&mcapitulo=$p&versaoLv=$vers'"; ?>);
        }
    }
    </script>

    <script src="../js/busca.js"></script>

</body>

</html>