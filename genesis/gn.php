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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZMN2PTNJK1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZMN2PTNJK1');
</script>
<body>
    <header>
        <div class="cabecalho">
            <a href="../index.html"> <img src="../img/cruz-a-tinta.png" /></a>
            <em>Biblia de Estudo Online</em>
        </div>
    </header>
    <nav>
        <!--    <ul class="versoes">
            <li><a href="NVI/gn1_nvi.html" title="Nova Versão Internacional">NVI</a></li>
            <li><a href="#" title="Almeida Corrigida e Fiel">ACF</a></li>
            <li><a href="NTLH/gn1_ntlh.html" title="Nova Tradução da Linguagem de Hoje">NTLH</a></li>
        </ul> -->
        <ul class="ferramentas">
            <li><a href="comentario/gn1-1_cmt.html" title="Comentário Bíblico">COMENTARIO</a></li>
            <li><a href="interlinear/gn1-1_int.html" title="Português - Grego/Hebraico interlinear">INTERLINEAR</a></li>
            <li><a href="#" title="Dicionário Bíblico">DICIONARIO</a></li>
            <li><a href="cruzadas/gn1-1_crz.html" title="Referências Cruzadas">CRUZADAS</a></li>
        </ul>

        <input type="search" name="pesquisa" id="busca" placeholder="Busca na Biblia" onsearch="minhabusca()" />

        <!-- <li><a href="#" title="Comentario Biblico"><?php echo iconv('UTF-8', 'ISO-8859-1', 'COMENTÁRIO'); ?> </a></li>
            <li><a href="#" title="Português - Grego/Hebraico interlinear">INTERLINEAR</a></li>
            <li><a href="#" title="Dicionario Biblico"><?php echo iconv('UTF-8', 'ISO-8859-1', 'DICIONÁRIO'); ?></a></li>
            <li><a href="#" title="Referencias Cruzadas">CRUZADAS</a></li> -->
            <ul>

                <!-- <li><a href="#">Ferramentas</a> -->
                <li><a href="gn2.php?livro=1&mcapitulo=1&versaoLv=6">NVI</a></li>
                <li><a href="gn2.php?livro=1&mcapitulo=1&versaoLv=2">ARC</a></li>
                <li><a href="gn2.php?livro=1&mcapitulo=1&versaoLv=5">NTLH</a></li>
                <li><a href="gn2.php?livro=1&mcapitulo=1&versaoLv=9">AR</a></li>

                <!--   <div class="sub-menu-1">
            <ul>
              <li><a href="#">Comentário</a></li>
              <li><a href="#">Interlinear</a></li>
              <li><a href="#">Dicionário</a></li>
              <li><a href="#">Cruzadas</a>

            </ul>
          </div> -->
                </li>
                <!--   <li><a href="#">Versões</a>
          <div class="sub-menu-1">
            <ul>
              <li><a href="genesis/gn2.php?livro=1&mcapitulo=1&versaoLv=6">NVI</a></li>
              <li><a href="genesis/gn2.php?livro=1&mcapitulo=1&versaoLv=2">ARC</a></li>
              <li><a href="genesis/gn2.php?livro=1&mcapitulo=1&versaoLv=5">NTLH</a></li>
              <li><a href="genesis/gn2.php?livro=1&mcapitulo=1&versaoLv=9">AR</a></li>

            </ul>
          </div>
        </li> -->
            </ul>

        </div>
    </nav>
    <?php
    require('../conexao.php');

    ?>

    <div class="breadscrumbs">

        <!-- <a href="../index.html"> Biblia</a> &shy; > <a href="#">ACF</a>
        <span style="color: #606060">&shy; >  &shy;</span> -->
        <a href="../index.html"><i class='bx bx-home' style="font-size: 22pt;"></i></a>
    </div>

    <div id="corpo">
        <div class="sel_livros selNova">
            <form method="POST" action="" name="livronome" id="livronome">

                <select name="livro" id="tst" onchange="this.form.submit()">
                    <?php
                    $livro = $_POST['livro'];
                    $capitulo = $_POST['mcapitulo'];
                    $vers = $_POST['versaoLv'];
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
                        <option value="1" <?php if ($livro == '1') echo "selected=\"selected\""; ?>>Genesis</option>
                        <option value="2" <?php if ($livro == '2') echo "selected=\"selected\""; ?>>Exodo</option>
                        <option value="3" <?php if ($livro == '3') echo "selected=\"selected\""; ?>>Levitico</option>
                        <option value="4" <?php if ($livro == '4') echo "selected=\"selected\""; ?>>Numeros</option>
                        <option value="5" <?php if ($livro == '5') echo "selected=\"selected\""; ?>>Deuteronomio</option>
                        <option value="6" <?php if ($livro == '6') echo "selected=\"selected\""; ?>>Josue</option>
                        <option value="7" <?php if ($livro == '7') echo "selected=\"selected\""; ?>>Juizes</option>
                        <option value="8" <?php if ($livro == '8') echo "selected=\"selected\""; ?>>Rute</option>
                        <option value="9" <?php if ($livro == '9') echo "selected=\"selected\""; ?>>1 Samuel</option>
                        <option value="10" <?php if ($livro == '10') echo "selected=\"selected\""; ?>>2 Samuel</option>
                        <option value="11" <?php if ($livro == '11') echo "selected=\"selected\""; ?>>1 Reis</option>
                        <option value="12" <?php if ($livro == '12') echo "selected=\"selected\""; ?>>2 Reis</option>
                        <option value="13" <?php if ($livro == '13') echo "selected=\"selected\""; ?>>1 Cronicas</option>
                        <option value="14" <?php if ($livro == '14') echo "selected=\"selected\""; ?>>2 Cronicas</option>
                        <option value="15" <?php if ($livro == '15') echo "selected=\"selected\""; ?>>Esdras</option>
                        <option value="16" <?php if ($livro == '16') echo "selected=\"selected\""; ?>>Neemias</option>
                        <option value="17" <?php if ($livro == '17') echo "selected=\"selected\""; ?>>Ester</option>
                        <option value="18" <?php if ($livro == '18') echo "selected=\"selected\""; ?>>Jo</option>
                        <option value="19" <?php if ($livro == '19') echo "selected=\"selected\""; ?>>Salmos</option>
                        <option value="20" <?php if ($livro == '20') echo "selected=\"selected\""; ?>>Proverbios</option>
                        <option value="21" <?php if ($livro == '21') echo "selected=\"selected\""; ?>>Eclesiastes</option>
                        <option value="22" <?php if ($livro == '22') echo "selected=\"selected\""; ?>>Cantares</option>
                        <option value="23" <?php if ($livro == '23') echo "selected=\"selected\""; ?>>Isaias</option>
                        <option value="24" <?php if ($livro == '24') echo "selected=\"selected\""; ?>>Jeremias</option>
                        <option value="25" <?php if ($livro == '25') echo "selected=\"selected\""; ?>>Lamentaçoes</option>
                        <option value="26" <?php if ($livro == '26') echo "selected=\"selected\""; ?>>Ezequiel</option>
                        <option value="27" <?php if ($livro == '27') echo "selected=\"selected\""; ?>>Daniel</option>
                        <option value="28" <?php if ($livro == '28') echo "selected=\"selected\""; ?>>Oseias</option>
                        <option value="29" <?php if ($livro == '29') echo "selected=\"selected\""; ?>>Joel</option>
                        <option value="30" <?php if ($livro == '30') echo "selected=\"selected\""; ?>>Amos</option>
                        <option value="31" <?php if ($livro == '31') echo "selected=\"selected\""; ?>>Obadias</option>
                        <option value="31" <?php if ($livro == '31') echo "selected=\"selected\""; ?>>Jonas</option>
                        <option value="31" <?php if ($livro == '31') echo "selected=\"selected\""; ?>>Miqueias</option>
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
                        <option value="43" <?php if ($livro == '43') echo "selected=\"selected\""; ?>>João</option>
                        <option value="44" <?php if ($livro == '44') echo "selected=\"selected\""; ?>>Atos</option>
                        <option value="45" <?php if ($livro == '45') echo "selected=\"selected\""; ?>>Romanos</option>
                        <option value="46" <?php if ($livro == '46') echo "selected=\"selected\""; ?>>1 Coríntios</option>
                        <option value="47" <?php if ($livro == '47') echo "selected=\"selected\""; ?>>2 Coríntios</option>
                        <option value="48" <?php if ($livro == '48') echo "selected=\"selected\""; ?>>Gálatas</option>
                        <option value="49" <?php if ($livro == '49') echo "selected=\"selected\""; ?>>Efésios</option>
                        <option value="50" <?php if ($livro == '50') echo "selected=\"selected\""; ?>>Filipenses</option>
                        <option value="51" <?php if ($livro == '51') echo "selected=\"selected\""; ?>>Colossenses</option>
                        <option value="52" <?php if ($livro == '52') echo "selected=\"selected\""; ?>>1 Tessalonissences</option>
                        <option value="53" <?php if ($livro == '53') echo "selected=\"selected\""; ?>>1 Tessalonissences</option>
                        <option value="54" <?php if ($livro == '54') echo "selected=\"selected\""; ?>>1 Timóteo</option>
                        <option value="55" <?php if ($livro == '55') echo "selected=\"selected\""; ?>>2 Timóteo</option>
                        <option value="56" <?php if ($livro == '56') echo "selected=\"selected\""; ?>>Tito</option>
                        <option value="57" <?php if ($livro == '57') echo "selected=\"selected\""; ?>>Filemom</option>
                        <option value="58" <?php if ($livro == '58') echo "selected=\"selected\""; ?>>Hebreus</option>
                        <option value="59" <?php if ($livro == '59') echo "selected=\"selected\""; ?>>Tiago</option>
                        <option value="60" <?php if ($livro == '60') echo "selected=\"selected\""; ?>>1 Pedro</option>
                        <option value="61" <?php if ($livro == '61') echo "selected=\"selected\""; ?>>2 Pedro</option>
                        <option value="62" <?php if ($livro == '62') echo "selected=\"selected\""; ?>>1 João</option>
                        <option value="63" <?php if ($livro == '63') echo "selected=\"selected\""; ?>>2 João</option>
                        <option value="64" <?php if ($livro == '64') echo "selected=\"selected\""; ?>>3 João</option>
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
                    <option value="3" <?php if ($vers == '6') echo "selected=\"selected\""; ?>>Nova Versao Internacional - NVI</option>
                </select>
                <!-- <input type="submit" value="Selecionar" style="width: 90px; "> -->
            </form>
        </div>


        <br>


        <div class="textoLv">
            <!-- <iframe id="vcap" src=" "  width="100%" height="60%"></iframe> -->
            <!-- <br> -->
            <p id='lv'></p>

            <?php

            echo "<h1>$titulo_livro $capitulo</h1>";
            echo '<hr>';
            echo '<p id="lv">' . '<strong>' . $result['ver_versiculo'] . '</strong>' . ' ' . $result['ver_texto'] . '</p>' . '<br>';

            foreach ($stmt->fetchAll() as $k) {
                echo '<p id="lv">' . '<strong>' . $k['ver_versiculo'] . '</strong>' . ' ' . $k['ver_texto'] . '</p>' . '<br>';
            }


            ?>

        </div>
    </div>

    <!--   <div class="setas">
        
         <a href="javascript:location.href=this.value"><i class='bx bx-left-arrow'></i></a>
        
        <a href="../genesis/gn2_acf.html"><i class='bx bx-right-arrow'></i></a>
    </div> -->
    <footer id="rodape">
        &copy; &shy;Biblia de Estudo Online
    </footer>
    <!-- script para selecionar o capitulo que esta na tela e setas  -->
    <input type="button" value=&rarr; id="next">
    <input type="button" value=&larr; id="prev">
    <script>
        text = <?php echo "$capitulo" . PHP_EOL; ?>
        select = document.querySelector('#capitulo_geral');
        t = document.querySelector('#capitulo_geral').length;
        if (text <= t) {
            select.value = text;
        } else {
            document.querySelector('.textoLv h1').textContent = '';
            select.value = '';
        }

        document.getElementById("next").onclick = function() {
            select = document.querySelector('#capitulo_geral')
            b = select.options[select.selectedIndex].value;
            v = parseInt(b);
            select.selectedIndex = b;
            select.onchange();

        }
        document.getElementById("prev").onclick = function() {
            select = document.querySelector('#capitulo_geral')
            b = select.options[select.selectedIndex].value;
            v = parseInt(b);
            select.selectedIndex = b - 2;
            select.onchange();

        }
    </script>
    <script src="../js/busca.js"></script>

</body>

</html>