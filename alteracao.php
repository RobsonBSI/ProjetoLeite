<?php
    require_once 'Class/ClassProduto.php';
    require_once 'Class/ClassProdutor.php';
    require_once 'Class/ClassProduto_Produtor.php';
    require_once 'Class/ClassPontoVenda.php';

    $pro = new ClassProduto("localhost", "leiteorganico", "postgres", "admin");
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");
    $pv = new ClassPontoVenda("localhost", "leiteorganico", "postgres", "admin");

    if (isset($_POST["altera_Produtor"])) {
        var_dump($_POST);
        $id = $_POST["id_produtor"];
        $produtor = isset($_POST["produtor"]) ? $_POST["produtor"] : null;
        $site =isset($_POST["websiter"]) ? $_POST["websiter"] : null;
        $instagram = isset($_POST["instagramProdutor"]) ? $_POST["instagramProdutor"] : null;
        $cep =isset($_POST["cep"]) ? $_POST["cep"] : null;
        $logradouro =isset($_POST["logradouro"]) ? $_POST["logradouro"] : null;
        $numero = isset($_POST["numero"]) ? $_POST["numero"] : null;
        $complemento = isset($_POST["complemento"]) ? $_POST["complemento"] : null;
        $cidade = isset($_POST["cidade"]) ? $_POST["cidade"] : null;
        $estado = isset($_POST["estado1"]) ? $_POST["estado1"] : null;
        $longitude = isset($_POST["longitude"]) ? $_POST["longitude"] : null;
        $latitude =isset($_POST["latitude"]) ? $_POST["latitude"] : null;
        $turismoRural = isset($_POST["turismo"]) ? $_POST["turismo"] : null;
        $vendaFazenda = isset($_POST["vendaFazenda"]) ? $_POST["vendaFazenda"] : null;
        $vendaSite = isset($_POST["vendaS"]) ? $_POST["vendaS"] : null;
        $telefone = $_POST["telefone"];
        $produtosFornecidos = isset($_POST["produtoF"]) ? $_POST["produtoF"] : null;
        $p->atualizarProdutor($id,$produtor,$site,$instagram,$cep,$logradouro,$numero,$complemento,$cidade,$estado,$longitude,$latitude,$turismoRural,$vendaFazenda,$vendaSite,$telefone);
        header("location:tabela.php");
        /*

        //$id_produto= $p->CadastrarProdutor($produtor,$site,$instagram,$cep,$logradouro,$numero,$complemento,$cidade,$estado,$longitude,$latitude,$turismoRural,$vendaFazenda,$vendaSite,$telefone,$dCadastro);

        if (!empty($produtosFornecidos)){
            foreach ($produtosFornecidos as $key => $v) {
                $pp->CadastrarPP($v,$id_produto);
            }
        }
        header("location:formulario.php");
        */
    }
    if (isset($_POST["altera_Comercio"])) {
        //var_dump($_POST);
        $id = $_POST["id_PontoVenda"];
        $nome =isset($_POST["nome"]) ? $_POST["nome"] : null;
        $semana = isset($_POST["semana"]) ? $_POST["semana"] : null;
        $inicio = isset($_POST["horarioInicio"]) ? $_POST["horarioInicio"] : null;
        $termino =isset($_POST["horarioTermino"]) ? $_POST["horarioTermino"] : null;
        $regiao = isset($_POST["regiao"]) ? $_POST["regiao"] : null;
        $telefone =isset($_POST["telefone"]) ? $_POST["telefone"] : null;
        $site =isset($_POST["site"]) ? $_POST["site"] : null;
        $cep =isset($_POST["cep"]) ? $_POST["cep"] : null;
        $logradouro =isset($_POST["logradouro"]) ? $_POST["logradouro"] : null;
        $numero = isset($_POST["numero"]) ? $_POST["numero"] : null;
        $complemento = isset($_POST["complemento"]) ? $_POST["complemento"] : null;
        $longitude = isset($_POST["longitude"]) ? $_POST["longitude"] : null;
        $latitude =isset($_POST["latitude"]) ? $_POST["latitude"] : null;
        $cidade = isset($_POST["cidade"]) ? $_POST["cidade"] : null;
        $estado = isset($_POST["estado"]) ? $_POST["estado"] : null;
        $produtosFornecidos = isset($_POST["produtoF"]) ? $_POST["produtoF"] : null;
        $proCadastrado = isset($_POST["produtor"]) ? $_POST["produtor"] : null;
/*
        echo "$id -
        $nome -
        $semana -
        $inicio -
        $termino -
        $regiao -
        $telefone -
        $site -
        $cep -
        $logradouro -
        $numero-
        $complemento -
        $longitude -
        $latitude-
        $cidade-
        $estado -

        $proCadastrado ";
*/
        $pv->atualizarVenda($id,$nome, $inicio, $termino, $regiao, $telefone, $site, $cep, $logradouro, $numero, $complemento, $latitude, $longitude, $cidade, $estado,$semana, $proCadastrado);
        header("location:tabelaComercio.php");
    }

?>