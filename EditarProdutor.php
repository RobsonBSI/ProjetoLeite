<?php

    require_once 'Class/ClassProduto.php';
    require_once 'Class/ClassProdutor.php';
    require_once 'Class/ClassProduto_Produtor.php';

    $pro = new ClassProduto("localhost", "leiteorganico", "postgres", "admin");
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");

?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Formulario</title>
    <script src="js/JQuery.js"></script><!--Versão 3.1.0-->
    <script src="js/layout.js"></script>
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/LeiteBase.png"/>
    <link rel="stylesheet" href="css/menuInformacao.css">


</head>

<body>
<?php
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $RetorProdu = $pp->BuscarPP($id);
    $rePro = array();
    for ($j = 0; $j < count($RetorProdu); $j++) {

    foreach ($RetorProdu[$j] as $k => $h) {
        if ($k == "produto") {
            $rePro[$j] = $h;
        }

    }
    }
    $retorno = $p->BuscarDadosProdutorIndividual($id);

    foreach ($retorno as $key => $v) {

        if ($key == "id") {
            $identrada =trim( $v);
        }
        if ($key == "nome") {
            $nome = trim($v);
        }
        if ($key == "site") {
            $site = trim($v);
        }
        if ($key == "instagran") {
            $insta = trim($v);
        }
        if ($key == "cep") {
            $cep = trim($v);
        }
        if ($key == "logradouro") {
            $logra =trim( $v);
        }
        if ($key == "numero") {
            $num = trim($v);
        }
        if ($key == "complemento") {
            $comple = trim($v);
        }
        if ($key == "cidade") {
            $cida = trim($v);
        }
        if ($key == "estado") {
            $es = trim($v);
        }
        if ($key == "longitude") {
            $long =trim( $v);
        }
        if ($key == "latitude") {
            $lat =trim( $v);
        }
        if ($key == "turismo") {
            $turis = trim($v);
        }
        if ($key == "fazenda") {
            $faz = trim($v);
        }
        if ($key == "online") {
            $onl = trim($v);
        }
        if ($key == "telefone") {
            $tel = trim($v);
        }
        if ($key == "data_aprovacao") {
            $ok =trim( $v);
        }
        if ($key == "cadastro") {
            $cas =trim( $v);
        }

    }

?>

<nav class="leite">

    <div class="seleMenu">
        <img  src="imagem/logo3.png" width="20%" height= "80%"  style="float:left; padding-left: 15%" >
        <p style=" margin-left:40%; margin-top:3%;font-size:40px ;" >Editar Produtor</p>
    </div>
</nav>

<!-- formulario do Fazendeiro -->
<div class="p2">

    <form method="post" action="alteracao.php" name="envio_Formulario1">
        <fieldset>
            <legend class="legendas">Dados do Produtor:</legend>
            <div class="tex12">
                <label for="produtor" class="labelInput required"> ID:</label>
                <input type="text" name="id_produtor" class="inputUser" value=" <?php echo $identrada; ?>" readonly>
            </div>

            <div class="tex12">
                <label for="produtor" class="labelInput required"> Nome:</label>
                <input type="text" name="produtor" class="inputUser" value=" <?php echo $nome; ?>">
            </div>
            <div class="tex12">
                <label for="websiter" class="labelInput"> Website:</label>
                <input type="text" name="websiter" class="inputUser" value=" <?php echo $site; ?>">
            </div>
            <div class="tex12">
                <label for="instagramProdutor" class="labelInput"> Instagram: </label>
                <input type="text" name="instagramProdutor" class="inputUser" value=" <?php echo $insta; ?>">
            </div>
            <div class="tex12">
                <label for="telefone" class="labelInput"> Telefone: </label>
                <input type="tel" name="telefone" class="inputUser" value=" <?php echo $tel; ?>">
            </div>
            <div class="tex12">
                <label for="produtoF" class="labelInput "> Produtos Produzidos na Fazenda:</label>
                <?php
                    $dados = $pro->BuscarProduto();
                    echo "<table>";
                    if (count($dados) > 0) {

                        for ($i = 0; $i < count($dados); $i++) {
                            echo "<tr>";
                            foreach ($dados[$i] as $key => $v) {
                                if ($key == "id") {
                                    $id_pro = $v;

                                }

                                if ($key == "produto") {
                                    for ($j = 0; $j < count($rePro); $j++) {

                                        if ($rePro[$j] == $v) {

                                            ?>
                                            <td>

                                                <input type="checkbox" id="<?php echo $v; ?>" name="produtoF[]"
                                                       value="<?php echo $id_pro; ?>" class="tes1" checked>
                                                <label for="<?php echo $v; ?>"
                                                       class="labelInputChek"> <?php echo $v; ?></label>
                                            </td>
                                            <?php
                                        }
                                    }
                                    $u = 0;
                                    for ($r = 0; $r < count($rePro); $r++) {
                                        if ($rePro[$r] !== $v && $u < count($rePro)) {
                                            $u++;
                                        }
                                        if ($rePro[$r] !== $v && $u == count($rePro)) {
                                            ?>
                                            <td>

                                                <input type="checkbox" id="<?php echo $v; ?>" name="produtoF[]"
                                                       value="<?php echo $id_pro; ?>" class="tes1">
                                                <label for="<?php echo $v; ?>"
                                                       class="labelInputChek"> <?php echo $v; ?></label>
                                            </td>
                                            <?php

                                        }
                                    }

                                    if (empty($RetorProdu)) {

                                        ?>
                                        <td>

                                            <input type="checkbox" id="<?php echo $v; ?>" name="produtoF[]"
                                                   value="<?php echo $id_pro; ?>" class="tes1">
                                            <label for="<?php echo $v; ?>"
                                                   class="labelInputChek"> <?php echo $v; ?></label>
                                        </td>
                                        <?php
                                    }

                                }


                            }

                        }
                    }

                    echo "</tr>";
                ?>

                </table>

            </div>
        </fieldset>
        <fieldset>
            <legend class="legendas"> Endereço</legend>

            <div class="tex12 ">
                <label for="cep" class="labelInput"> CEP:</label>
                <input type="text" name="cep" class="inputUser " value=" <?php echo $cep; ?>">
            </div>
            <div class="tex12">
                <label for="logradouro" class="labelInput "> Logradouro:</label>
                <input type="text" name="logradouro" class="inputUser" value=" <?php echo $logra; ?>">

                <label for="numero" class="labelInput "> Numero:</label>
                <input type="text" name="numero" class="inputUser" value=" <?php echo $num; ?>">

                <label for="complemento" class="labelInput"> Complemento :</label>
                <input type="text" name="complemento" class="inputUser" value=" <?php echo $comple; ?>">
            </div>
            <div class="tex12">
                <label for="latitude" class="labelInput "> Latitude(use graus decimais) :</label>
                <input type="text" name="latitude" value=" <?php echo $lat; ?>" class="inputUser">

                <label for="longitude" class="labelInput "> Longitude (use graus decimais):</label>
                <input type="text" name="longitude" value=" <?php echo $long; ?>" class="inputUser">
            </div>
            <div class="tex12">
                <label for="cidade" class="labelInput ">Cidade:</label>
                <input type="text" name="cidade" class="inputUser" value=" <?php echo $cida; ?>">

                <label for="estado" class="labelInput"> Estado:</label>
                <select id="estado" name="estado" class="inputUser required">
                    <option value="AC" <?php echo $es == 'AC' ? 'selected' : ''; ?> >Acre</option>
                    <option value="AL" <?php echo $es == 'AL' ? 'selected' : ''; ?> >Alagoas</option>
                    <option value="AP" <?php echo $es == 'AP' ? 'selected' : ''; ?> >Amapá</option>
                    <option value="AM" <?php echo $es == 'AM' ? 'selected' : ''; ?> >Amazonas</option>
                    <option value="BA" <?php echo $es == 'BA' ? 'selected' : ''; ?> >Bahia</option>
                    <option value="CE" <?php echo $es == 'CE' ? 'selected' : ''; ?> >Ceará</option>
                    <option value="DF" <?php echo $es == 'DF' ? 'selected' : ''; ?> >Distrito Federal</option>
                    <option value="ES" <?php echo $es == 'ES' ? 'selected' : ''; ?> >Espírito Santo</option>
                    <option value="GO" <?php echo $es == 'GO' ? 'selected' : ''; ?> >Goiás</option>
                    <option value="MA" <?php echo $es == 'MA' ? 'selected' : ''; ?> >Maranhão</option>
                    <option value="MT" <?php echo $es == 'MT' ? 'selected' : ''; ?> >Mato Grosso</option>
                    <option value="MS" <?php echo $es == 'MS' ? 'selected' : ''; ?> >Mato Grosso do Sul</option>
                    <option value="MG" <?php echo $es == 'MG' ? 'selected' : ''; ?> >Minas Gerais</option>
                    <option value="PA" <?php echo $es == 'PA' ? 'selected' : ''; ?> >Pará</option>
                    <option value="PB" <?php echo $es == 'PB' ? 'selected' : ''; ?> >Paraíba</option>
                    <option value="PR" <?php echo $es == 'PR' ? 'selected' : ''; ?> >Paraná</option>
                    <option value="PE" <?php echo $es == 'PE' ? 'selected' : ''; ?> >Pernambuco</option>
                    <option value="PI" <?php echo $es == 'PI' ? 'selected' : ''; ?> >Piauí</option>
                    <option value="RJ" <?php echo $es == 'RJ' ? 'selected' : ''; ?> >Rio de Janeiro</option>
                    <option value="RN" <?php echo $es == 'RN' ? 'selected' : ''; ?> >Rio Grande do Norte</option>
                    <option value="RS" <?php echo $es == 'RS' ? 'selected' : ''; ?> >Rio Grande do Sul</option>
                    <option value="RO" <?php echo $es == 'RO' ? 'selected' : ''; ?> >Rondônia</option>
                    <option value="RR" <?php echo $es == 'RR' ? 'selected' : ''; ?> >Roraima</option>
                    <option value="SC" <?php echo $es == 'SC' ? 'selected' : ''; ?> >Santa Catarina</option>
                    <option value="SP" <?php echo $es == 'SP' ? 'selected' : ''; ?> >São Paulo</option>
                    <option value="SE" <?php echo $es == 'SE' ? 'selected' : ''; ?> >Sergipe</option>
                    <option value="TO" <?php echo $es == 'TO' ? 'selected' : ''; ?> >Tocantins</option>


                </select>
            </div>
        </fieldset>
        <fieldset>
            <legend class="legendas"> Informações Complementares:</legend>
            <div class="labelInput">
                <label for="vendaFazenda"> Vendas na Fazenda ?</label>

                <input type="radio" name="vendaFazenda" id="Sim"
                       value="True" <?php echo $faz == 'True' ? 'checked' : ''; ?>>Sim
                <input type="radio" name="vendaFazenda" id="nao"
                       value="false" <?php echo $faz == 'false' ? 'checked' : ''; ?> >Não
            </div>
            <div class="labelInput">
                <label for="turismo"> Turismo Rural na Fazenda ?</label>

                <input type="radio" name="turismo" id="sim1"
                       value="True" <?php echo $turis == 'True' ? 'checked' : ''; ?>>Sim
                <input type="radio" name="turismo" id="nao1"
                       value="false" <?php echo $turis == 'false' ? 'checked' : ''; ?>>Não
            </div>
            <div class="labelInput">
                <label for="turismo"> Possui venda por site ? </label>

                <input type="radio" name="vendaS" id="Sim" value="True" <?php echo $onl == 'True' ? 'checked' : ''; ?>>Sim
                <input type="radio" name="vendaS" id="nao"
                       value="false" <?php echo $onl == 'false' ? 'checked' : ''; ?>>Não
            </div>
        </fieldset>
        <div>
        </div>
        <div style="text-align: center">
            <button type="submit" name="altera_Produtor" class="button button1" value="Enviar">Altera</button>
            <?php
                if(empty($ok)){
                    ?>
                    <a class="button button3" href="tabela.php" >voltar</a>
                    <?php
                }else{
                    ?>
                    <a class="button button3" href="tabelaAprovado.php" >voltar</a>
                    <?php
                }
            ?>


        </div>




    </form>
</div>



</body>
</html>
