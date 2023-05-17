<?php
    require_once 'Class/ClassTipo.php';
    require_once 'Class/ClassProduto.php';
    require_once 'Class/ClassProdutor.php';
    require_once 'Class/ClassPontoVenda.php';
    require_once 'Class/ClassProduto_Produtor.php';
    require_once 'Class/ClassProduto_Ponto_Venda.php';
    require_once 'Class/ClassComercio_Produtor.php';
    $pro = new ClassProduto("localhost", "leiteorganico", "postgres", "admin");
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    $t = new ClassTipo("localhost", "leiteorganico", "postgres", "admin");
    $pv = new ClassPontoVenda("localhost", "leiteorganico", "postgres", "admin");
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");
    $ppv = new ClassProduto_Ponto_Venda("localhost", "leiteorganico", "postgres", "admin");
    $cp = new ClassComercio_Produtor("localhost", "leiteorganico", "postgres", "admin");
?>


<!doctype html>
<html lang="pt-br">
<head>
    <title>Formulario</title>
    <script src="js/JQuery.js"></script><!--Versão 3.1.0-->
    <script src="js/layout.js"></script>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/LeiteBase.png"/>
    <script src="js/ValidacaoFazenda.js"></script>
    <script src="js/Validacao.js"></script>


</head>

<body>
<nav class="leite">

    <img  src="imagem/logo3.png" width="20%" height= "100%" style="float:left; margin-left:10%;" >


    <div class="seleMenu" style="float:right;margin-right:40% ;">

        Selecione seu perfil:
        <div>
            <select name="tipo" id="tipo" required class="sele">
                <option value="">selecione</option>
                <option value="prod">Produtor</option>
                <option value="comer">Comerciante</option>
            </select>
        </div>
    </div>

</nav>

<?php
    $produto = "";
    date_default_timezone_set('America/Fortaleza');

    $dCadastro = date('d/m/Y H:i:s');

    if (isset($_POST["envia_Produtor"])) {

        $inf = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $produtor = $_POST["produtor"];
        $site = $_POST["websiter"];
        $instagram = $_POST["instagramProdutor"];
        $cep = $_POST["cep"];
        $logradouro = $_POST["logradouro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $cidade = $_POST["cidade"];
        $estado = isset($_POST["estado"]) ? $_POST["estado"] : null;
        $longitude = $_POST["longitude"];
        $latitude = $_POST["latitude"];
        $turismoRural = isset($_POST["turismo"]) ? $_POST["turismo"] : null;
        $vendaFazenda = isset($_POST["vendaFazenda"]) ? $_POST["vendaFazenda"] : null;
        $vendaSite = isset($_POST["vendaS"]) ? $_POST["vendaS"] : null;
        $telefone = $_POST["telefone"];
        $produtosFornecidos = isset($_POST["produtoF"]) ? $_POST["produtoF"] : null;

        date_default_timezone_set('America/Fortaleza');
        $dCadastro = date('d/m/Y H:i:s');

        $id_produto = $p->CadastrarProdutor($produtor, $site, $instagram, $cep, $logradouro, $numero, $complemento, $cidade, $estado, $longitude, $latitude, $turismoRural, $vendaFazenda, $vendaSite, $telefone, $dCadastro);

        if (!empty($produtosFornecidos)) {
            foreach ($produtosFornecidos as $key => $v) {
                $pp->CadastrarPP($v, $id_produto);
            }
        }
        header("location:obrigado.html");


    }


    if (isset($_POST['envia_Comerciante'])) {
        $informacao = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // var_dump($informacao);


        $tipo = $_POST["tipo1"];
        $nome = $_POST["nome"];
        $semana = isset($_POST["diaAtentimento"]) ? $_POST["diaAtentimento"] : null;
        $inicio = $_POST["horarioInicio"];
        $termino = $_POST["horarioTermino"];
        $regiao = $_POST["regiao"];
        $telefone = $_POST["telefone"];
        $site = $_POST["site"];
        $cep = $_POST["cep"];
        $logradouro = $_POST["logradouro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $longitude = $_POST["longitude"];
        $latitude = $_POST["latitude"];
        $cidade = $_POST["cidade"];
        $estado = isset($_POST["estado"]) ? $_POST["estado"] : null;
        $produtosFornecidos = isset($_POST["produtoF"]) ? $_POST["produtoF"] : null;
        $produtorCadastro = isset($_POST["produtor1"]) ? $_POST["produtor1"] : null;


        $sema = "";
        if (!empty($semana)) {
            foreach ($semana as $k => $v) {
                if (empty($sema)) {
                    $sema = $v;
                } else {
                    $sema = $sema . " , " . $v;
                }
            }
            $sema = $sema;
        } else {
            $sema = $sema;
        }

        $proCadastrado = "";
        if (!empty($produtorCadastro)) {
            foreach ($produtorCadastro as $key => $v) {
                if (empty($proCadastrado)) {
                    $proCadastrado = $v;
                } else {
                    $proCadastrado = $proCadastrado . " - " . $v;
                }

            }
        }

        //echo $proCadastrado;

        date_default_timezone_set('America/Fortaleza');
        $dCadastro = date('d/m/Y H:i:s');
        $id_PontoVenda = $pv->CadastrarPontoVenda($nome, $inicio, $termino, $regiao, $telefone, $site, $cep, $logradouro, $numero, $complemento, $latitude, $longitude, $cidade, $estado, $tipo, $dCadastro, $sema, $proCadastrado);

        if (!empty($produtosFornecidos)) {
            foreach ($produtosFornecidos as $key => $v) {
                $ppv->CadastrarPPV($v, $id_PontoVenda);
            }
        }
        /*
                              if (!empty($produtorCadastro)) {
                                  foreach ($produtorCadastro as $key => $v) {
                                      $cp->CadastrarCP($id_PontoVenda, $v);
                                  }
                              }
         */
        header("location:obrigado.html");


    }
?>


<!-- formulario para o comercio -->
<div class="p2" hidden>
    <form method="post" action="" name="forComercio">
        <fieldset style="padding-left:2%;padding-bottom:1%;  ">
            <legend class="legendas">Dados Cadastrais</legend>
            <h2 class="labelInput required">Tipo de Comercio:</h2>

            <select id="tipo1" name="tipo1" class="inputUser required">
                <?php
                    $d = $t->BuscarTiposDados();
                    if (count($d) > 0) {

                        for ($i = 0; $i < count($d); $i++) {
                            foreach ($d[$i] as $key => $v) {
                                if ($key == "id") {
                                    $id_tipo = $v;
                                }
                                if ($key == "venda") {
                                    echo "<option value =' $id_tipo' > $v</option >";
                                }

                            }
                        }
                    }
                ?>
                <option value="" selected disabled hidden> selecione</option>
            </select>

            <div class="tex12 ">
                <label for="nome" class="labelInput required">Nome: </label>
                <input type="text" id="nome" name="nome" class="inputUser " >
            </div>

            <div class="feira" hidden>

                <label class="labelInput required"> dias da semana:</label>
                <table>
                    <tr>


                        <td> Domingo<input type="checkbox" id="dom" name="diaAtentimento[]" value="Domingo" class="tes2">
                        </td>
                        <td><label> Segunda - Feira</label>
                            <input type="checkbox" id="seg" name="diaAtentimento[]"
                                   value="Segunda-Feira" class="tes2"></td>
                        <td> Terça - Feira<input type="checkbox" id="ter" name="diaAtentimento[]"
                                                 value="Terca-Feira" class="tes2"></td>
                        <td> Quarta - Feira<input type="checkbox" id="quar" name="diaAtentimento[]"
                                                  value="Quarta-Feira" class="tes2"></td>
                        <td> Quinta - Feira<input type="checkbox" id="qui" name="diaAtentimento[]"
                                                  value="Quinta-Feira" class="tes2"></td>
                        <td> Sexta - Feira<input type="checkbox" id="sex" name="diaAtentimento[]"
                                                 value="Sexta-Feira" class="tes2"></td>
                        <td> Sábado<input type="checkbox" id="sab" name="diaAtentimento[]" value="Sabado" class="tes2"></td>





                    </tr>
                </table>

                <div class="labelInput  ">
                    Horario de:
                    <input type="time" name="horarioInicio" class="inputUser1"> as
                    <input type="time" name="horarioTermino" class="inputUser1" >
                </div>

            </div>
            <div class="vOline" hidden>
                <div class="tex12 ">
                    <label for="site" class="labelInput required"> Site</label>
                    <input type="text" name="site" class="inputUser " >
                </div>
            </div>
            <div class="mercado" hidden>

                <div class="tex12">
                    <label for="telefone" class="labelInput"> Telefone: </label>
                    <input type="tel" name="telefone" class="inputUser" >
                </div>
            </div>
            <div class="cesta" hidden>

                <div class="tex12 ">
                    <label for="regiao" class="labelInput required">Região atendida: </label>
                    <input type="text" name="regiao" class="inputUser " >
                </div>


            </div>


        </fieldset>
        <fieldset style="padding-left:2%;padding-bottom:1%;">
            <legend class="legendas"> Endereço</legend>

            <div class="tex12 ">
                <label for="cep" class="labelInput"> CEP:</label>
                <input type="text" name="cep" id="cep" class="inputUser " >
            </div>
            <div class="tex12 ">
                <label for="logradouro" class="labelInput"> Logradouro:</label>
                <input type="text" name="logradouro" class="inputUser " >

                <label for="numero" class="labelInput"> Numero:</label>
                <input type="text" name="numero" class="inputUser " >

                <label for="complemento" class="labelInput"> Complemento:</label>
                <input type="text" name="complemento" class="inputUser " >


            </div>
            <div class="tex12">
                <label for="latitude" class="labelInput required"> Latitude(use graus decimais)
                    :</label>
                <input type="text" name="latitude" placeholder="ex:-21.76831702553611"
                       class="inputUser" >

                <label for="longitude" class="labelInput required"> Longitude(use graus
                    decimais):</label>
                <input type="text" name="longitude" placeholder="ex:-43.36274894571893"
                       class="inputUser" >
            </div>
            <div class="tex12">
                <label for="cidade" class="labelInput required"> Cidade:</label>
                <input type="text" name="cidade" class="inputUser" >

                <label for="estado" class="labelInput required"> Estado:</label>
                <select id="estado" name="estado" class="inputUser required">
                    <option value="AC"> Acre</option>
                    <option value="AL"> Alagoas</option>
                    <option value="AP"> Amapá</option>
                    <option value="AM"> Amazonas</option>
                    <option value="BA"> Bahia</option>
                    <option value="CE"> Ceará</option>
                    <option value="DF"> Distrito Federal</option>
                    <option value="ES"> Espírito Santo</option>
                    <option value="GO"> Goiás</option>
                    <option value="MA"> Maranhão</option>
                    <option value="MT"> Mato Grosso</option>
                    <option value="MS"> Mato Grosso do Sul</option>
                    <option value="MG"> Minas Gerais</option>
                    <option value="PA"> Pará</option>
                    <option value="PB"> Paraíba</option>
                    <option value="PR"> Paraná</option>
                    <option value="PE"> Pernambuco</option>
                    <option value="PI"> Piauí</option>
                    <option value="RJ"> Rio de Janeiro</option>
                    <option value="RN"> Rio Grande do Norte</option>
                    <option value="RS"> Rio Grande do Sul</option>
                    <option value="RO"> Rondônia</option>
                    <option value="RR"> Roraima</option>
                    <option value="SC"> Santa Catarina</option>
                    <option value="SP"> São Paulo</option>
                    <option value="SE"> Sergipe</option>
                    <option value="TO"> Tocantins</option>
                    <option value="" selected disabled hidden> Estado</option>
                </select>
            </div>

        </fieldset>
        <fieldset style="padding-left:2%;padding-bottom:1%;">
            <legend class="legendas">Cadastro em relação Fornecimento:</legend>


            <div id="formulario">
                <div class="form-group  ">
                    <label class="labelInput ">Produtor: </label>
                    <input type="text" name="produtor1[]" class="inputUser" id="fornecedor">
                    <button type="button" id="add_campo"
                            style=" border: 2px solid #bed9f8; background-color: white; padding: 0.4% 0.8%;  font-size: 16px;">
                        +
                    </button>
                </div>
            </div>
            <table>
                <label for="produtoF" class="labelInput required"> Produtos comercializados :</label>
                <?php
                    $dados = $pro->BuscarProduto();

                    if (count($dados) > 0) {

                        for ($i = 0; $i < count($dados); $i++) {
                            echo "<tr>";
                            foreach ($dados[$i] as $key => $v) {
                                if ($key == "id") {
                                    $id_pro = $v;

                                }

                                if ($key == "produto") {
                                    if (!empty($rePro)) {


                                        for ($j = 0; $j < count($rePro); $j++) {

                                            if ($rePro[$j] == $id_pro) {
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
                                            if ($rePro[$r] != $id_pro && $u < count($rePro)) {
                                                $u++;
                                            }
                                            if ($rePro[$r] != $id_pro && $u == count($rePro)) {
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
                                    } else {

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
        </fieldset>
        <label for="produtoF" class="labelInput required" style="padding-left:2%;padding-top:1%;">
            <input type="checkbox" name="aceita" class="ac1" > aceito o termo de uso: <a href="https://leiteorganico.cnpgl.embrapa.br/termouso.pdf" target="_blank" rel="noopener noreferrer"> (Termos de Uso)</a>
        </label>
        <label for="produtoF" class="labelInput required" style="padding-left:2%;padding-bottom:1%;">
            <input type="checkbox" name="aceita1" class="ac2"> aceito a declaração de privacidade: <a href="https://leiteorganico.cnpgl.embrapa.br/declaracaoprivacidade.pdf" target="_blank" rel="noopener noreferrer"> (Declaração de Privacidade)</a>
        </label>
        <p class="required"> Campos obrigatorios </p>
        <div class="botao1">
            <button type="submit" name="envia_Comerciante" class="botao" onclick="return valida()"> Cadastrar</button>
        </div>

    </form>

</div>


<!-- formulario do Fazendeiro -->
<div class="p1" hidden>

    <form method="post" action="" name="forProdutor">
        <fieldset style="padding-left:2%;padding-bottom:1%;">
            <legend class="legendas">Dados do Produtor:</legend>
            <div class="tex12">
                <label for="produtor" class="labelInput required"> Nome:</label>
                <input type="text" name="produtor" class="inputUser" >
            </div>
            <div class="tex12">
                <label for="websiter" class="labelInput"> Website:</label>
                <input type="text" name="websiter" class="inputUser" >
            </div>
            <div class="tex12">
                <label for="instagramProdutor" class="labelInput"> Instagram: </label>
                <input type="text" name="instagramProdutor" class="inputUser" >
            </div>
            <div class="tex12">
                <label for="telefone" class="labelInput"> Telefone: </label>
                <input type="tel" name="telefone" class="inputUser" >
            </div>
            <div class="tex12">
                <table>
                    <label for="produtoF" class="labelInput required"> Produtos Produzidos na Fazenda:</label>
                    <?php

                        $dados = $pro->BuscarProduto();

                        if (count($dados) > 0) {

                            for ($i = 0; $i < count($dados); $i++) {
                                echo "<tr>";
                                foreach ($dados[$i] as $key => $v) {
                                    if ($key == "id") {
                                        $id_pro = $v;

                                    }

                                    if ($key == "produto") {


                                        ?>
                                        <td>

                                            <input type="checkbox" id="<?php echo $v; ?>" name="produtoF[]"
                                                   value="<?php echo $id_pro; ?>" class="tes1" id="produtoF">
                                            <label for="<?php echo $v; ?>"
                                                   class="labelInputChek"> <?php echo $v; ?></label>
                                        </td>
                                        <?php
                                    }

                                }


                            }


                        }

                        echo "</tr>";
                    ?>

                </table>

            </div>
        </fieldset>
        <fieldset  style="padding-left:2%;padding-bottom:1%;">
            <legend class="legendas"> Endereço</legend>

            <div class="tex12 ">
                <label for="cep" class="labelInput  required"> CEP:</label>
                <input type="text" name="cep" id="cep" class="inputUser " >
            </div>
            <div class="tex12 ">
                <label for="logradouro" class="labelInput  required"> Logradouro:</label>
                <input type="text" name="logradouro" class="inputUser ">

                <label for="numero" class="labelInput  required"> Numero:</label>
                <input type="text" name="numero" class="inputUser " >

                <label for="complemento" class="labelInput "> Complemento:</label>
                <input type="text" name="complemento" class="inputUser " >


            </div>
            <div class="tex12">
                <label for="latitude" class="labelInput required"> Latitude(use graus decimais)
                    :</label>
                <input type="text" name="latitude" placeholder="ex:-21.76831702553611"
                       class="inputUser" >

                <label for="longitude" class="labelInput required"> Longitude(use graus
                    decimais):</label>
                <input type="text" name="longitude" placeholder="ex:-43.36274894571893"
                       class="inputUser" >
            </div>
            <div class="tex12">
                <label for="cidade" class="labelInput required"> Cidade:</label>
                <input type="text" name="cidade" class="inputUser" >

                <label for="estado" class="labelInput required"> Estado:</label>
                <select  id="estado"  name="estado" class="inputUser required">
                    <option value="AC"> Acre</option>
                    <option value="AL"> Alagoas</option>
                    <option value="AP"> Amapá</option>
                    <option value="AM"> Amazonas</option>
                    <option value="BA"> Bahia</option>
                    <option value="CE"> Ceará</option>
                    <option value="DF"> Distrito Federal</option>
                    <option value="ES"> Espírito Santo</option>
                    <option value="GO"> Goiás</option>
                    <option value="MA"> Maranhão</option>
                    <option value="MT"> Mato Grosso</option>
                    <option value="MS"> Mato Grosso do Sul</option>
                    <option value="MG"> Minas Gerais</option>
                    <option value="PA"> Pará</option>
                    <option value="PB"> Paraíba</option>
                    <option value="PR"> Paraná</option>
                    <option value="PE"> Pernambuco</option>
                    <option value="PI"> Piauí</option>
                    <option value="RJ"> Rio de Janeiro</option>
                    <option value="RN"> Rio Grande do Norte</option>
                    <option value="RS"> Rio Grande do Sul</option>
                    <option value="RO"> Rondônia</option>
                    <option value="RR"> Roraima</option>
                    <option value="SC"> Santa Catarina</option>
                    <option value="SP"> São Paulo</option>
                    <option value="SE"> Sergipe</option>
                    <option value="TO"> Tocantins</option>
                    <option value="" selected disabled hidden> Estado</option>
                </select>
            </div>
        </fieldset>
        <fieldset  style="padding-left:2%;padding-bottom:1%;">
            <legend class="legendas"> Informações Complementares:</legend>
            <div class="labelInput">
                <label for="vendaFazenda" class=" required"> Vendas na Fazenda ?</label>

                <input type="radio" name="vendaFazenda" id="Sim"
                       value="True">Sim
                <input type="radio" name="vendaFazenda" id="nao"
                       value="false" >Não
            </div>
            <div class="labelInput">
                <label for="turismo" class=" required"> Turismo Rural na Fazenda ?</label>

                <input type="radio" name="turismo" id="sim1"
                       value="True" >Sim
                <input type="radio" name="turismo" id="nao1"
                       value="false" >Não
            </div>
            <div class="labelInput">
                <label for="turismo" class=" required"> Possui venda por site ? </label>

                <input type="radio" name="vendaS" id="Sim" value="True" >Sim
                <input type="radio" name="vendaS" id="nao" value="false" >Não
            </div>
        </fieldset>
        <label for="produtoF" class="labelInput required"  style="padding-left:2%;padding-top:1%;">
            <input type="checkbox" name="aceita" class="ac1" > aceito o termo de uso: <a href="https://leiteorganico.cnpgl.embrapa.br/termouso.pdf" target="_blank" rel="noopener noreferrer"> (Termos de Uso)</a>
        </label>
        <label for="produtoF" class="labelInput required"  style="padding-left:2%;padding-bottom:1%;">
            <input type="checkbox" name="aceita1" class="ac2"> aceito a declaração de privacidade: <a href="https://leiteorganico.cnpgl.embrapa.br/declaracaoprivacidade.pdf" target="_blank" rel="noopener noreferrer"> (Declaração de Privacidade)</a>
        </label>
        <p class="required"> Campos obrigatorios </p>
        <div class="botao1">
            <button type="submit" name="envia_Produtor" class="botao"  onclick="return validarProdutor()">Cadastrar</button>
        </div>
    </form>
</div>
<script src="js/custom.js"></script>
<script>
    var cont = 1;

    $('#add_campo').click(function () {
        cont++;
        //https://api.jquery.com/append/
        $('#formulario').append('<div class="form-group" id="campo' + cont + '"> <label class="labelInput ">Produtor: </label><input type="text" name="produtor1[]" class="inputUser" id="fornecedor"> <button type="button" id="' + cont + '" class="btn-apagar" style=" border: 2px solid #c6d1f6; background-color: white; padding: 0.4% 0.8%; font-size: 16px;"> - </button></div>');
    });

    $('form').on('click', '.btn-apagar', function () {
        var button_id = $(this).attr("id");
        $('#campo' + button_id + '').remove();
    });
</script>

</body>
</html>

