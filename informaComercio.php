<?php

    require_once 'Class/ClassPontoVenda.php';
    require_once 'Class/ClassProduto_Ponto_Venda.php';
    require_once 'Class/ClassComercio_Produtor.php';

    $pv = new ClassPontoVenda("localhost", "leiteorganico", "postgres", "admin");
    $ppv=new ClassProduto_Ponto_Venda("localhost", "leiteorganico", "postgres", "admin");
    $cp=new ClassComercio_Produtor("localhost", "leiteorganico", "postgres", "admin");
?>



<!doctype html>
<html lang="pt-br">
<head>

    <title>Formulario</title>

    <link rel="shortcut icon" type="imagem/x-icon"/>
    <link rel="stylesheet" href="css/estilo2.css">


</head>

<body>

<?php
    $id = isset($_GET["id"]) ? $_GET["id"] : null;


?>
<nav class="leite">

    <div class="seleMenu">

    </div>
</nav>


<!-- formulario para o comercio -->
<div class="p2"

<?php
    $retorno = $pv->BuscarPonto($id);
    $ret=$cp->BuscarComercioProdutor($id);
    $prod=$ppv->BuscarComercioProduto($id);

    $idsaida = $retorno['tipo_id'];
    $Produtor='';
    $Produto='';
?>
       <form method="post" action=" ">
        <?php
    if ($idsaida == 8) {
        ?>

             <fieldset>
                <legend class="legendas">Dados Cadastrais</legend>
                <div class="orga">
                    <?php


                        foreach ($retorno as $key => $v) {

                            if ($key == "venda") {
                                echo " <b>tipo de comercio:</b> $v <br>";
                            }
                            if ($key == "id") {
                                $identrada = $v;
                            }
                            if ($key == "nome") {
                                echo "<b>nome: </b>$v  <br>";
                            }
                            if ($key == "regiao") {
                                echo "<b>Regiao: </b>$v  <br>";
                            }
                            if ($key == "telefone") {
                                echo "<b> telefone: </b>$v  <br>";
                            }
                            if ($key == "site") {
                                echo "<b>site: </b>$v  <br>";
                            }
                            if ($key == "cep") {
                                echo "<b>Cep: </b>$v  <br>";
                            }
                            if ($key == "logradouro") {
                                echo "<b>Logradouro:</b> $v  <br>";
                            }
                            if ($key == "numero") {
                                echo "<b> numero :</b> $v  <br>";
                            }
                            if ($key == "complemento") {
                                echo "<b>complemento: </b>$v  <br>";
                            }
                            if ($key == "latitude") {
                                echo "<b>Latitude: </b>$v  <br>";
                            }
                            if ($key == "longitude") {
                                echo "<b>Longitude:</b> $v  <br>";
                            }
                            if ($key == "cidade") {
                                echo " <b>Cidade: </b>$v  <br>";
                            }
                            if ($key == "estado") {
                                echo "<b>Estado: </b> $v  <br>";
                            }
                            if ($key == "cadastro") {
                                echo "<b>Data e Hora :</b> $v  <br>";
                            }


                        }
                        for ($i = 0; $i < count( $ret); $i++) {
                            foreach ($ret[$i] as $k => $v4) {
                                if ($k== "outro") {
                                    if (empty($Produtor)) {
                                        $Produtor= $v4;
                                    } else {
                                        $Produtor =  $Produtor . " - " . $v4;
                                    }
                                }


                            }
                        }
                        for ($j = 0; $j < count($prod); $j++) {
                            foreach ( $prod[$j] as $k1 => $v2) {
                                if ($k1== "produto") {
                                    if (empty($Produto)) {
                                        $Produto= $v2;
                                    } else {
                                        $Produto =  $Produto . " - " . $v2;
                                    }
                                }
                            }
                        }
                        echo " <b>Produtores que tem produto na Loja: </b> $Produtor <br>";
                        echo " <b>Produtos: </b> $Produto";
                    ?>

                </div>

            </fieldset>


        <?php
    }
?>

<?php
    if ($idsaida == 7) {
        ?>

            <fieldset>
                <legend class="legendas">Dados Cadastrais</legend>
                <div class="orga">
                    <?php


                        foreach ($retorno as $key => $v) {

                            if ($key == "venda") {
                                echo " <b>tipo de comercio: </b>$v <br>";
                            }
                            if ($key == "id") {
                                $identrada = $v;
                            }
                            if ($key == "nome") {
                                echo "<b>nome: </b>$v  <br>";
                            }
                            if ($key == "semana") {
                                echo "<b>Dias da Semana: </b>$v  <br>";
                            }
                            if ($key == "inicio") {
                                echo "<b> Hora de Inicio: </b>$v  <br>";
                            }
                            if ($key == "termino") {
                                echo "<b>Hora de Termino:</b> $v  <br>";
                            }
                            if ($key == "cep") {
                                echo "<b>Cep:</b> $v  <br>";
                            }
                            if ($key == "logradouro") {
                                echo "<b>Logradouro: </b>$v  <br>";
                            }
                            if ($key == "numero") {
                                echo " <b>numero : </b>$v  <br>";
                            }
                            if ($key == "complemento") {
                                echo "<b>complemento: </b>$v  <br>";
                            }
                            if ($key == "latitude") {
                                echo "<b>Latitude:</b> $v  <br>";
                            }
                            if ($key == "longitude") {
                                echo "<b>Longitude: </b>$v  <br>";
                            }
                            if ($key == "cidade") {
                                echo "<b> Cidade:</b> $v  <br>";
                            }
                            if ($key == "estado") {
                                echo "<b>Estado: </b>$v  <br>";
                            }
                            if ($key == "cadastro") {
                                echo "<b>Data e Hora : </b>$v  <br>";
                            }


                        }
                        for ($i = 0; $i < count( $ret); $i++) {
                            foreach ($ret[$i] as $k => $v4) {
                                if ($k== "outro") {
                                    if (empty($Produtor)) {
                                        $Produtor= $v4;
                                    } else {
                                        $Produtor =  $Produtor . " - " . $v4;
                                    }
                                }


                            }
                        }
                        for ($j = 0; $j < count($prod); $j++) {
                            foreach ( $prod[$j] as $k1 => $v2) {
                                if ($k1== "produto") {
                                    if (empty($Produto)) {
                                        $Produto= $v2;
                                    } else {
                                        $Produto =  $Produto . " - " . $v2;
                                    }
                                }
                            }
                        }
                        echo " <b>Produtores que tem produto na Loja: </b> $Produtor <br>";
                        echo " <b>Produtos: </b> $Produto";

                    ?>

                </div>

            </fieldset>


        <?php
    }
?>

<?php
    if ($idsaida == 9) {
        ?>

            <fieldset>
                <legend class="legendas">Dados Cadastrais</legend>
                <div class="orga">
                    <?php


                        foreach ($retorno as $key => $v) {

                            if ($key == "venda") {
                                echo "<b> tipo de comercio: </b>$v <br>";
                            }
                            if ($key == "id") {
                                $identrada = $v;
                            }
                            if ($key == "nome") {
                                echo "<b>nome:</b> $v  <br>";
                            }
                            if ($key == "site") {
                                echo "<b>site:</b> $v<br>";
                            }
                            if ($key == "cep") {
                                echo "<b>Cep: </b>$v  <br>";
                            }
                            if ($key == "logradouro") {
                                echo "<b>Logradouro:</b> $v  <br>";
                            }
                            if ($key == "numero") {
                                echo " <b>numero : </b>$v  <br>";
                            }
                            if ($key == "complemento") {
                                echo "<b>complemento: </b>$v  <br>";
                            }
                            if ($key == "latitude") {
                                echo "<b>Latitude: </b>$v  <br>";
                            }
                            if ($key == "longitude") {
                                echo "<b>Longitude: </b>$v  <br>";
                            }
                            if ($key == "cidade") {
                                echo "<b>Cidade: </b>$v  <br>";
                            }
                            if ($key == "estado") {
                                echo "<b>EStado:</b> $v  <br>";
                            }
                            if ($key == "cadastro") {
                                echo "<b>Data e Hora :</b> $v  <br>";
                            }


                        }
                        for ($i = 0; $i < count( $ret); $i++) {
                            foreach ($ret[$i] as $k => $v4) {
                                if ($k== "outro") {
                                    if (empty($Produtor)) {
                                        $Produtor= $v4;
                                    } else {
                                        $Produtor =  $Produtor . " - " . $v4;
                                    }
                                }


                            }
                        }
                        for ($j = 0; $j < count($prod); $j++) {
                            foreach ( $prod[$j] as $k1 => $v2) {
                                if ($k1== "produto") {
                                    if (empty($Produto)) {
                                        $Produto= $v2;
                                    } else {
                                        $Produto =  $Produto . " - " . $v2;
                                    }
                                }
                            }
                        }
                        echo " <b>Produtores que tem produto na Loja: </b> $Produtor <br>";
                        echo " <b>Produtos: </b> $Produto";
                    ?>

                </div>

            </fieldset>


        <?php
    }
?>


<?php
    if ($idsaida == 17) {
        ?>

            <fieldset>
                <legend class="legendas">Dados Cadastrais</legend>
                <div class="orga">
                    <?php


                        foreach ($retorno as $key => $v) {

                            if ($key == "venda") {
                                echo "<b> Tipo de comercio:</b> $v <br>";
                            }
                            if ($key == "id") {
                                $identrada = $v;
                            }
                            if ($key == "nome") {
                                echo "<b>Nome:</b> $v <br>";
                            }
                            if ($key == "telefone") {
                                echo "<b> Telefone:</b> $v  <br>";
                            }
                            if ($key == "site") {
                                echo "<b>Site:</b> $v  <br>";
                            }
                            if ($key == "cep") {
                                echo "<b>Cep:</b> $v  <br>";
                            }
                            if ($key == "logradouro") {
                                echo "<b>Logradouro:</b> $v  <br>";
                            }
                            if ($key == "numero") {
                                echo " <b>numero :</b> $v  <br>";
                            }
                            if ($key == "complemento") {
                                echo "<b>complemento: </b>$v  <br>";
                            }
                            if ($key == "latitude") {
                                echo "<b>Latitude:</b> $v  <br>";
                            }
                            if ($key == "longitude") {
                                echo "<b>Longitude: </b>$v  <br>";
                            }
                            if ($key == "cidade") {
                                echo "<b> Cidade:</b> $v  <br>";
                            }
                            if ($key == "estado") {
                                echo "<b>Estado:</b> $v  <br>";
                            }
                            if ($key == "cadastro") {
                                echo "<b>Data e Hora : </b>$v  <br>";
                            }


                        }
                        for ($i = 0; $i < count( $ret); $i++) {
                            foreach ($ret[$i] as $k => $v4) {
                                if ($k== "outro") {
                                  if (empty($Produtor)) {
                                      $Produtor= $v4;
                                  } else {
                                      $Produtor =  $Produtor . " - " . $v4;
                                  }
                            }


                            }
                        }
                        for ($j = 0; $j < count($prod); $j++) {
                            foreach ( $prod[$j] as $k1 => $v2) {
                                if ($k1== "produto") {
                                    if (empty($Produto)) {
                                        $Produto= $v2;
                                    } else {
                                        $Produto =  $Produto . " - " . $v2;
                                    }
                                }
                            }
                        }
                        echo " <b>Produtores que tem produto na Loja: </b> $Produtor <br>";
                        echo " <b>Produtos: </b> $Produto";
                    ?>

                </div>

            </fieldset>


        <?php
    }
?>
            <div style="text-align: center">

                <a class="button button1" href="tabelaComercio.php?id_aprovado= <?php echo $identrada; ?>">Aprovado</a>
                <a class="button button2" href="tabelaComercio.php?id= <?php echo $identrada; ?>">Rejeitar</a>
                <a class="button button3" href="tabelaComercio.php" >voltar</a>
            </div>
        </form>


</div>


</body>
</html>
