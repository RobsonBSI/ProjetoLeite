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
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/mar.png"/>


</head>

<body>
<nav class="leite">

    <div class="seleMenu">Selecione ponto de venda:
        <div>
            <select name="tipo" id="tipo" required class="sele">
                <option value="">Selecione</option>
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

        if (empty($inf['produtor'])) {
            echo " <script>alert('Erro:  Necessário preencher o campo nome!');</script>";
        } elseif (empty($inf['cep'])) {
            echo "<script>alert('Erro: Necessário preencher o campo cep!!');</script>";
        } elseif (empty($inf['longitude'])) {
            echo "<script>alert('Erro:Necessário preencher o campo longitude');</script> ";
        } elseif (empty($inf['latitude'])) {
            echo "<script>alert('Erro: Necessário preencher o campo Latitude!');</script>";
        } elseif (empty($inf['estado'])) {
            echo "<script>alert('Erro: Necessário preencher o campo Estado!');</script>";
        } else {

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
            header("location:formulario.php");

        }
    }


    if (isset($_POST['envia_Comerciante'])) {
        $informacao = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        // var_dump($informacao);
        if (empty($informacao['nome'])) {
            echo " <script>alert('Erro:  Necessário preencher o campo nome!');</script>";
        } elseif (empty($informacao['cep'])) {
            echo "<script>alert('Erro: Necessário preencher o campo cep!!');</script>";
        } elseif (empty($informacao['longitude'])) {
            echo "<script>alert('Erro:Necessário preencher o campo longitude');</script> ";
        } elseif (empty($informacao['latitude'])) {
            echo "<script>alert('Erro: Necessário preencher o campo Latitude!');</script>";
        } elseif (empty($informacao['estado'])) {
            echo "<script>alert('Erro: Necessário preencher o campo Estado!');</script>";
        } else {


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
            $id_PontoVenda = $pv->CadastrarPontoVenda($nome, $inicio, $termino, $regiao, $telefone, $site, $cep, $logradouro, $numero, $complemento, $latitude, $longitude, $cidade, $estado, $tipo, $dCadastro, $sema,$proCadastrado);

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
            header("location:formulario.php");

        }
    }

?>


<!-- formulario para o comercio -->
<div class="p2" hidden>
    <form method="post" action="">
        <fieldset>
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
            <?php
                $nome = "";
                $se = "";
                $logradouro = "";
                $cep = "";
                $cidade = "";
                $numero = "";
                $complemento = "";
                $latitude = "";
                $longitude = "";
                $es = "";
                $reg = "";
                $tel1 = "";
                $sit1 = "";
                $rePro = "";
                $horarioInicio = "";
                $horarioTermino = "";
                if (isset($informacao['nome'])) {
                    $nome = $informacao['nome'];
                }
                if (isset($informacao['cep'])) {
                    $cep = $informacao['cep'];
                }
                if (isset($informacao['logradouro'])) {
                    $logradouro = $informacao['logradouro'];
                }
                if (isset($informacao['numero'])) {
                    $numero = $informacao['numero'];
                }
                if (isset($informacao['complemento'])) {
                    $complemento = $informacao['complemento'];
                }
                if (isset($informacao['latitude'])) {
                    $latitude = $informacao['latitude'];
                }
                if (isset($informacao['longitude'])) {
                    $longitude = $informacao['longitude'];
                }
                if (isset($informacao['cidade'])) {
                    $cidade = $informacao['cidade'];
                }
                if (isset($informacao['estado'])) {
                    $es = $informacao['estado'];
                }
                if (isset($informacao['diaAtentimento'])) {
                    $se = $informacao['diaAtentimento'];
                }
                if (isset($informacao['horarioTermino'])) {
                    $horarioTermino = $informacao['horarioTermino'];
                }
                if (isset($informacao['horarioInicio'])) {
                    $horarioInicio = $informacao['horarioInicio'];
                }

                if (isset($informacao['regiao'])) {
                    $reg = $informacao['regiao'];
                }
                if (isset($informacao['telefone'])) {
                    $tel1 = $informacao['telefone'];
                }
                if (isset($informacao['site'])) {
                    $sit1 = $informacao['site'];
                }
                if (isset($informacao['produtoF'])) {
                    $rePro = $informacao['produtoF'];
                }


            ?>
            <div class="tex12 ">
                <label for="nome" class="labelInput required">Nome: </label>
                <input type="text" id="nome" name="nome" class="inputUser " value="<?php echo $nome; ?>">
            </div>

            <div class="feira" hidden>

                <label class="labelInput required"> dias da semana:</label>
                <table>
                    <tr>
                        <?php
                            if (!empty($se)) {
                                /*
                                foreach ($se as $key => $v) {
                                    ?>


                                    <?php
                                    if ($v == 'Domingo') {
                                        echo "<td> Domingo<input type='checkbox' id='dom' name='diaAtentimento[]' value='Domingo'  checked></td>";
                                    }
                                    if ($v == 'Segunda-Feira') {
                                        echo "<td> Segunda-Feira<input type='checkbox' id='seg' name='diaAtentimento[]' value='Segunda-Feira'  checked></td>";
                                    }
                                    if ($v == 'Terca-Feira') {
                                        echo "<td> Terça-Feira<input type='checkbox' id='ter' name='diaAtentimento[]' value='Terca-Feira'  checked></td>";
                                    }
                                    if ($v == 'Quarta-Feira') {
                                        echo "<td> Quarta-Feira<input type='checkbox' id='qua' name='diaAtentimento[]' value='Quarta-Feira'  checked></td>";
                                    }
                                    if ($v == 'Quinta-Feira') {
                                        echo "<td> Quinta-Feira<input type='checkbox' id='qui' name='diaAtentimento[]' value='Quinta-Feira'  checked></td>";
                                    }
                                    if ($v == 'Terca-Feira') {
                                        echo "<td> Sexta-Feira<input type='checkbox' id='sex' name='diaAtentimento[]' value='Sexta-Feira'  checked></td>";
                                    }
                                    if ($v == 'Sabado') {
                                        echo "<td> Sábado<input type='checkbox' id='sab' name='diaAtentimento[]' value='Sabado'  checked></td>";
                                    }

                                }*/
                                $u = 0;
                                for ($r = 0; $r < count($se); $r++) {
                                    if ($se[$r] != 'Domingo' && $u < count($se)) {
                                        $u++;
                                    }
                                    if ($se[$r] != 'Domingo') {
                                        ?>
                                        <td> Domingo<input type='checkbox' id='dom' name='diaAtentimento[]'
                                                           value='Domingo'></td>
                                        <?php
                                    } else {
                                        echo "<td> Domingo<input type='checkbox' id='dom' name='diaAtentimento[]' value='Domingo'  checked></td>";
                                    }
                                    if ($se[$r] != "Segunda-Feira" && $u < count($se)) {
                                        $u++;
                                    }

                                    if ($se[$r] != "Segunda-Feira" && $u == count($se)) {
                                        ?>
                                        <td> Segunda-Feira<input type='checkbox' id='seg' name='diaAtentimento[]'
                                                                 value='Segunda-Feira'></td>
                                        <?php

                                    }

                                    if ($se[$r] != "Terça-Feira" && $u < count($se)) {
                                        $u++;
                                    }

                                    if ($se[$r] != "Terça-Feira" && $u == count($se)) {
                                        ?>
                                        <td> Terça-Feirao<input type='checkbox' id='seg' name='diaAtentimento[]'
                                                                value='Terça-Feira'></td>
                                        <?php

                                    }
                                    if ($se[$r] != "Quarta-Feira" && $u < count($se)) {
                                        $u++;
                                    }
                                    if ($se[$r] != "Quarta-Feira" && $u == count($se)) {
                                        ?>
                                        <td> Quarta-Feira<input type='checkbox' id='qua' name='diaAtentimento[]'
                                                                value='Quarta-Feira'></td>
                                        <?php

                                    }
                                }


                            } else {

                                ?>

                                <td> Domingo<input type="checkbox" id="dom" name="diaAtentimento[]" value="Domingo">
                                </td>
                                <td><label> Segunda - Feira</label>
                                    <input type="checkbox" id="seg" name="diaAtentimento[]"
                                           value="Segunda-Feira"></td>
                                <td> Terça - Feira<input type="checkbox" id="ter" name="diaAtentimento[]"
                                                         value="Terca-Feira"></td>
                                <td> Quarta - Feira<input type="checkbox" id="quar" name="diaAtentimento[]"
                                                          value="Quarta-Feira"></td>
                                <td> Quinta - Feira<input type="checkbox" id="qui" name="diaAtentimento[]"
                                                          value="Quinta-Feira"></td>
                                <td> Sexta - Feira<input type="checkbox" id="sex" name="diaAtentimento[]"
                                                         value="Sexta-Feira"></td>
                                <td> Sábado<input type="checkbox" id="sab" name="diaAtentimento[]" value="Sabado"></td>


                                <?php
                            }
                        ?>


                    </tr>
                </table>

                <div class="labelInput  ">
                    Horario de:
                    <input type="time" name="horarioInicio" class="inputUser1" value="<?php echo $horarioInicio; ?>"> as
                    <input type="time" name="horarioTermino" class="inputUser1" value="<?php echo $horarioTermino; ?>">
                </div>

            </div>
            <div class="vOline" hidden>
                <div class="tex12 ">
                    <label for="site" class="labelInput required"> Site</label>
                    <input type="text" name="site" class="inputUser " value="<?php echo $sit1; ?>">
                </div>
            </div>
            <div class="mercado" hidden>

                <div class="tex12">
                    <label for="telefone" class="labelInput"> Telefone: </label>
                    <input type="tel" name="telefone" class="inputUser" value="<?php echo $tel1; ?>">
                </div>
            </div>
            <div class="cesta" hidden>

                <div class="tex12 ">
                    <label for="regiao" class="labelInput required">Região: </label>
                    <input type="text" name="regiao" class="inputUser " value="<?php echo $reg; ?>">
                </div>


            </div>


        </fieldset>
        <fieldset>
            <legend class="legendas"> Endereço</legend>

            <div class="tex12 ">
                <label for="cep" class="labelInput"> CEP:</label>
                <input type="text" name="cep" id="cep" class="inputUser " value="<?php echo $cep; ?>">
            </div>
            <div class="tex12 ">
                <label for="logradouro" class="labelInput"> Logradouro:</label>
                <input type="text" name="logradouro" class="inputUser " value="<?php echo $logradouro; ?>">

                <label for="numero" class="labelInput"> Numero:</label>
                <input type="text" name="numero" class="inputUser " value="<?php echo $numero; ?>">

                <label for="complemento" class="labelInput"> Complemento:</label>
                <input type="text" name="complemento" class="inputUser " value="<?php echo $complemento; ?>">


            </div>
            <div class="tex12">
                <label for="latitude" class="labelInput required"> Latitude(use graus decimais)
                    :</label>
                <input type="text" name="latitude" placeholder="ex:-21.76831702553611"
                       class="inputUser" value="<?php echo $latitude; ?>">

                <label for="longitude" class="labelInput required"> Longitude(use graus
                    decimais):</label>
                <input type="text" name="longitude" placeholder="ex:-43.36274894571893"
                       class="inputUser" value="<?php echo $longitude; ?>">
            </div>
            <div class="tex12">
                <label for="cidade" class="labelInput required"> Cidade:</label>
                <input type="text" name="cidade" class="inputUser" value="<?php echo $cidade; ?>">

                <label for="estado" class="labelInput required"> Estado:</label>
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
            <legend class="legendas">Cadastro em relação Fornecimento:</legend>


            <div id="formulario">
                <div class="form-group  ">
                    <label class="labelInput ">Produtor: </label>
                    <input type="text" name="produtor1[]" class="inputUser">
                    <button type="button" id="add_campo"
                            style=" border: 2px solid #4CAF50; background-color: white; padding: 0.4% 0.8%;  font-size: 16px;">
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
        <p class="required"> Campos obrigatorios </p>
        <div class="botao1">
            <button type="submit" name="envia_Comerciante" class="botao" value="Enviar"> Cadastrar</button>
        </div>

    </form>

</div>


<!-- formulario do Fazendeiro -->
<div class="p1" hidden>
    <?php
        $n = "";
        $tel2 = "";
        $sit2 = "";
        $inst = "";
        $logradouro = "";
        $cep = "";
        $cidade = "";
        $numero = "";
        $complemento = "";
        $latitude = "";
        $longitude = "";
        $es = "";
        $tur = "";
        $faz = "";
        $ven = "";
        $rePro = "";

        if (isset($inf['produtor'])) {
            $n = $inf['produtor'];
        }
        if (isset($inf['instagramProdutor'])) {
            $inst = $inf['instagramProdutor'];
        }
        if (isset($inf['websiter'])) {
            $sit2 = $inf['websiter'];
        }
        if (isset($inf['telefone'])) {
            $tel2 = $inf['telefone'];
        }
        if (isset($inf['cep'])) {
            $cep = $inf['cep'];
        }
        if (isset($inf['logradouro'])) {
            $logradouro = $inf['logradouro'];
        }
        if (isset($inf['numero'])) {
            $numero = $inf['numero'];
        }
        if (isset($inf['complemento'])) {
            $complemento = $inf['complemento'];
        }
        if (isset($inf['latitude'])) {
            $latitude = $inf['latitude'];
        }
        if (isset($inf['longitude'])) {
            $longitude = $inf['longitude'];
        }
        if (isset($inf['cidade'])) {
            $cidade = $inf['cidade'];
        }
        if (isset($inf['estado'])) {
            $es = $inf['estado'];
        }
        if (isset($inf['produtoF'])) {
            $rePro = $inf['produtoF'];
        }
        if (isset($inf['turismo'])) {
            $tur = $inf['turismo'];
        }
        if (isset($inf['vendaFazenda'])) {
            $faz = $inf['vendaFazenda'];
        }
        if (isset($inf['vendaS'])) {
            $ven = $inf['vendaS'];
        }


    ?>
    <form method="post" action="" name="envio_Formulario1">
        <fieldset>
            <legend class="legendas">Dados do Produtor:</legend>
            <div class="tex12">
                <label for="produtor" class="labelInput required"> Nome:</label>
                <input type="text" name="produtor" class="inputUser" required value="<?php echo $n; ?>">
            </div>
            <div class="tex12">
                <label for="websiter" class="labelInput"> Website:</label>
                <input type="text" name="websiter" class="inputUser" value="<?php echo $sit2; ?>">
            </div>
            <div class="tex12">
                <label for="instagramProdutor" class="labelInput"> Instagram: </label>
                <input type="text" name="instagramProdutor" class="inputUser" value="<?php echo $inst; ?>">
            </div>
            <div class="tex12">
                <label for="telefone" class="labelInput"> Telefone: </label>
                <input type="tel" name="telefone" class="inputUser" value="<?php echo $tel2; ?>">
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

            </div>
        </fieldset>
        <fieldset>
            <legend class="legendas"> Endereço</legend>

            <div class="tex12 ">
                <label for="cep" class="labelInput"> CEP:</label>
                <input type="text" name="cep" id="cep" class="inputUser " value="<?php echo $cep; ?>">
            </div>
            <div class="tex12 ">
                <label for="logradouro" class="labelInput"> Logradouro:</label>
                <input type="text" name="logradouro" class="inputUser " value="<?php echo $logradouro; ?>">

                <label for="numero" class="labelInput"> Numero:</label>
                <input type="text" name="numero" class="inputUser " value="<?php echo $numero; ?>">

                <label for="complemento" class="labelInput"> Complemento:</label>
                <input type="text" name="complemento" class="inputUser " value="<?php echo $complemento; ?>">


            </div>
            <div class="tex12">
                <label for="latitude" class="labelInput required"> Latitude(use graus decimais)
                    :</label>
                <input type="text" name="latitude" placeholder="ex:-21.76831702553611"
                       class="inputUser" value="<?php echo $latitude; ?>">

                <label for="longitude" class="labelInput required"> Longitude(use graus
                    decimais):</label>
                <input type="text" name="longitude" placeholder="ex:-43.36274894571893"
                       class="inputUser" value="<?php echo $longitude; ?>">
            </div>
            <div class="tex12">
                <label for="cidade" class="labelInput required"> Cidade:</label>
                <input type="text" name="cidade" class="inputUser" value="<?php echo $cidade; ?>">

                <label for="estado" class="labelInput required"> Estado:</label>
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
                <label for="vendaFazenda" class=" required"> Vendas na Fazenda ?</label>

                <input type="radio" name="vendaFazenda" id="Sim"
                       value="True" <?php echo $faz == 'True' ? 'checked' : ''; ?>>Sim
                <input type="radio" name="vendaFazenda" id="nao"
                       value="false" <?php echo $faz == 'false' ? 'checked' : ''; ?>>Não
            </div>
            <div class="labelInput">
                <label for="turismo" class=" required"> Turismo Rural na Fazenda ?</label>

                <input type="radio" name="turismo" id="sim1"
                       value="True" <?php echo $tur == 'True' ? 'checked' : ''; ?> >Sim
                <input type="radio" name="turismo" id="nao1"
                       value="false" <?php echo $tur == 'false' ? 'checked' : ''; ?>>Não
            </div>
            <div class="labelInput">
                <label for="turismo" class=" required"> Possui venda por site ? </label>

                <input type="radio" name="vendaS" id="Sim" value="True" <?php echo $ven == 'True' ? 'checked' : ''; ?>>Sim
                <input type="radio" name="vendaS" id="nao" value="false"<?php echo $ven == 'false' ? 'checked' : ''; ?>>Não
            </div>
        </fieldset>
        <p class="required"> Campos obrigatorios</p>
        <div class="botao1">
            <button type="submit" name="envia_Produtor" class="botao" value="Enviar">Cadastrar</button>
        </div>
    </form>
</div>
<script src="js/custom.js"></script>
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
