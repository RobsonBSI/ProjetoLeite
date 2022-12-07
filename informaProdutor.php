<?php

    require_once 'Class/ClassProdutor.php';
    require_once 'Class/ClassProduto_Produtor.php';
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");
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
<div class="p2">
<?php
    $retorno = $p->BuscarDadosProdutorIndividual($id);
    $produ = $pp->BuscarPP($id);

    $Produto="";
        ?>
        <form method="post" action="">
            <fieldset>
                <legend class="legendas">Dados Cadastrais</legend>
                <div class="orga">
                    <?php


                        foreach ($retorno as $key => $v) {

                            if ($key == "venda") {
                                echo " tipo de comercio: $v <br>";
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
                            if ($key == "instagran") {
                                echo "<b>Instagran: </b>$v  <br>";
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
                            if ($key == "turismo") {
                                if("false"==$v){
                                    echo "<b> Possui turismo na fazenda?: </b>Não  <br>";
                                }else{
                                    echo "<b> Possui turismo na fazenda?: </b>Sim <br>";
                                }

                            }
                            if ($key == "fazenda") {
                                if("false"==$v){
                                    echo "<b> Possui turismo na fazenda?: </b>Não  <br>";
                                }else{
                                    echo "<b> Possui turismo na fazenda?: </b>Sim <br>";
                                }
                            }
                            if ($key == "online") {
                                if("false"==$v){
                                    echo "<b> Possui turismo na fazenda?: </b>Não  <br>";
                                }else{
                                    echo "<b> Possui turismo na fazenda?: </b>Sim <br>";
                                }
                            }


                        }
                        for ($i = 0; $i < count( $produ); $i++) {
                            foreach ( $produ[$i] as $k => $v4) {
                                if ($k== "produto") {
                                    if (empty($Produto)) {
                                        $Produto= $v4;
                                    } else {
                                        $Produto =  $Produto . " - " . $v4;
                                    }
                                }


                            }
                        }
                        echo "<b> Produto(s):</b>  $Produto "

                    ?>

                </div>

            </fieldset>
            <div style="text-align: center">
                <a class="button button1" href="tabela.php?id_aprovado= <?php echo $identrada; ?>">Aprovado</a>
                <a class="button button2" href="tabela.php?id= <?php echo $identrada; ?>">Rejeitar</a>
                <a class="button button3" href="EditarProdutor.php?id= <?php echo $identrada;?>"> Editar</a>
                <a class="button button4" href="tabela.php" >voltar</a>
            </div>

        </form>

</div>


</body>
</html>
