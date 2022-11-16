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
    <script src="js/selecaoComercio.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/mar.png"/>
    <link rel="stylesheet" href="css/estilo2.css">



</head>

<body>

<?php

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $produtorVendas = $cp-> BuscarComercioProdutor($id);


    $RetorProdu = $ppv->BuscarComercioProduto($id);
    $rePro = array();
    for ($j = 0; $j < count($RetorProdu); $j++) {

        foreach ($RetorProdu[$j] as $k => $h) {
            if ($k == "produto") {
                $rePro[$j] = $h;
            }

        }
    }

    $retorno = $pv->BuscarPonto($id);

    foreach ($retorno as $key => $v) {
        if ($key == "venda") {
            $venda = $v;
        }

        if ($key == "id") {
            $identrada = $v;
        }
        if ($key == "nome") {
            $nome = $v;
        }
        if ($key == "site") {
            $site = $v;
        }
        if ($key == "regiao") {
            $reg = $v;
        }
        if ($key == "inicio") {
            $ini = $v;
        }
        if ($key == "termino") {
            $ter = $v;
        }
        if ($key == "semana") {
            $sema = $v;
        }

        if ($key == "cep") {
            $cep = $v;
        }
        if ($key == "logradouro") {
            $logra = $v;
        }
        if ($key == "numero") {
            $num = $v;
        }
        if ($key == "complemento") {
            $comple = $v;
        }
        if ($key == "cidade") {
            $cida = $v;
        }
        if ($key == "estado") {
            $es = $v;
        }
        if ($key == "longitude") {
            $long = $v;
        }
        if ($key == "latitude") {
            $lat = $v;
        }

        if ($key == "telefone") {
            $tel = $v;
        }
        if ($key == "tipo_id") {
            $tipo_ID = $v;
        }


    }
   
?>

<nav class="leite">

    <div class="seleMenu">
        Editar Comercio
    </div>
</nav>
<!-- formulario para o comercio -->
<div class="p2">
    <form method="post" action="alteracao.php">

        <fieldset>
            <legend class="legendas">Dados Cadastrais</legend>

            <div class="tex12">
                <label for="produtor" class="labelInput"> ID:</label>
                <input type="text" name="id_PontoVenda" class="inputUser" value=" <?php echo $identrada; ?>" readonly>
            </div>
            <div class="tex12">
                <label for="produtor" class="labelInput "> Tipo de comercio:</label>
                <input type="text" name="nome_Tipo" class="inputUser" value=" <?php echo $venda; ?>" readonly>
            </div>
            <div class="tex12 ">
                <label for="nome" class="labelInput">Nome: </label>
                <input type="text" name="nome" class="inputUser " value=" <?php echo $nome; ?>">
            </div>
            <?php
                if ($venda == "Cesta") {

                    ?>

                    <div class="tex12 ">
                        <label for="site" class="labelInput"> Site</label>
                        <input type="text" name="site" class="inputUser " value=" <?php echo $site; ?>">
                    </div>


                    <div class="tex12">
                        <label for="telefone" class="labelInput"> Telefone: </label>
                        <input type="tel" name="telefone" class="inputUser" value=" <?php echo $tel; ?>">
                    </div>


                    <div class="tex12 ">
                        <label for="regiao" class="labelInput">Região: </label>
                        <input type="text" name="regiao" class="inputUser " value=" <?php echo $reg; ?>">
                    </div>


                    <?php
                }

            ?>
            <?php
                if ($venda == "Feira") {

                    ?>

                    <label class="labelInput required"> dias da semana:</label>
                    <input type="text" name="horarioInicio" class="inputUser1" value=" <?php echo $sema; ?>">

                    <div class="labelInput  ">
                        Horario de:
                        <input type="text" name="horarioInicio" class="inputUser1" value=" <?php echo $ini; ?>"> as
                        <input type="text"
                               name="horarioTermino"
                               class="inputUser1" value=" <?php echo $ter; ?>">
                    </div>


                    <?php
                }

            ?>
            <?php
                if ($venda == "Venda online") {

                    ?>

                    <div class="tex12 ">
                        <label for="site" class="labelInput "> Site</label>
                        <input type="text" name="site" class="inputUser " value=" <?php echo $site; ?>">
                    </div>


                    <?php
                }

            ?>
            <?php
                if ($venda == "Mercado") {

                    ?>


                    <div class="tex12 ">
                        <label for="site" class="labelInput required"> Site</label>
                        <input type="text" name="site" class="inputUser " value=" <?php echo $site; ?>">
                    </div>

                    <div class="tex12">
                        <label for="telefone" class="labelInput"> Telefone: </label>
                        <input type="tel" name="telefone" class="inputUser" value=" <?php echo $tel; ?>">
                    </div>


                    <?php
                }

            ?>

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
                <select id="estado" name="estado" class="inputUser ">
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
            <table>
            <legend class="legendas">Cadastro em relação Fornecimento:</legend>

            <?php

                if (count($produtorVendas) > 0) {

                for ($z = 0; $z < count($produtorVendas); $z++) {
                    foreach ($produtorVendas[$z]  as $y => $x) {
                        if ($y == "id") {
                            $identradaProdutorVenda = $x;
                        }
                        if ($y == "outro") {
                            $outro = $x
                            ?>
                            <div id="formulario">
                                <div class="form-group  ">
                                    <label class="labelInput ">Produtor: </label>
                                    <input type="text" name="produtor1[]" class="inputUser" value="<?php  echo  $outro;  ?>">

                                    <a type="button" class="btn btn-outline-danger"  href="editarComercio.php?id_Apagar= <?php echo  $identradaProdutorVenda; ?>">Excluir</a>

                            <?php
                        }
                    }

                }
                }
            ?>
                                    <button type="button" id="add_campo"
                                            style=" border: 2px solid #4CAF50; background-color: white; padding: 0.4% 0.8%;  font-size: 16px;">
                                        +
                                    </button>
                                </div>
                                     </div>
            </table>
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
        </fieldset>


        <div style="text-align: center">
            <button type="submit" name="altera_Comercio" class="button button1" value="Enviar">Altera</button>
            <a class="button button3" href="tabelaComercioAprovado.php" >voltar</a>

        </div>

    </form>

</div>
<script>
    var cont = 1;

    $('#add_campo').click(function () {
        cont++;
        //https://api.jquery.com/append/
        $('#formulario').append('<div class="form-group" id="campo' + cont + '"> <label class="labelInput ">Produtor: </label><input type="text" name="produtor1[]" class="inputUser"> <button type="button" id="' + cont + '" class="btn-apagar" style=" border: 2px solid #ff0000; background-color: white; padding: 0.4% 0.8%; font-size: 16px;"> - </button></div>');
    });

    $('form').on('click', '.btn-apagar', function () {
        var button_id = $(this).attr("id");
        $('#campo' + button_id + '').remove();
    });
</script>

</body>
</html>
