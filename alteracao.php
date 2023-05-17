<?php
    require_once 'Class/ClassProduto.php';
    require_once 'Class/ClassProdutor.php';
    require_once 'Class/ClassProduto_Produtor.php';
    require_once 'Class/ClassPontoVenda.php';
    require_once 'Class/ClassProduto_Ponto_Venda.php';

    $pro = new ClassProduto("localhost", "leiteorganico", "postgres", "admin");
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");
    $pv = new ClassPontoVenda("localhost", "leiteorganico", "postgres", "admin");
    $ppv = new ClassProduto_Ponto_Venda("localhost", "leiteorganico", "postgres", "admin");
    if (isset($_POST["altera_Produtor"])) {
        var_dump($_POST);
        $id = $_POST["id_produtor"];
        $produtor = trim(isset($_POST["produtor"]) ? $_POST["produtor"] : null);
        $email = trim(isset($_POST["emailComercio"]) ? $_POST["emailComercio"] : null);
        $site =trim(isset($_POST["websiter"]) ? $_POST["websiter"] : null);
        $instagram = trim(isset($_POST["instagramProdutor"]) ? $_POST["instagramProdutor"] : null);
        $cep =trim(isset($_POST["cep"]) ? $_POST["cep"] : null);
        $logradouro =trim(isset($_POST["logradouro"]) ? $_POST["logradouro"] : null);
        $numero = trim(isset($_POST["numero"]) ? $_POST["numero"] : null);
        $complemento = trim(isset($_POST["complemento"]) ? $_POST["complemento"] : null);
        $cidade = trim(isset($_POST["cidade"]) ? $_POST["cidade"] : null);
        $estado = trim(isset($_POST["estado"]) ? $_POST["estado"] : null);
        $longitude = trim(isset($_POST["longitude"]) ? $_POST["longitude"] : null);
        $latitude =trim(isset($_POST["latitude"]) ? $_POST["latitude"] : null);
        $turismoRural = trim(isset($_POST["turismo"]) ? $_POST["turismo"] : null);
        $vendaFazenda = trim(isset($_POST["vendaFazenda"]) ? $_POST["vendaFazenda"] : null);
        $vendaSite = trim(isset($_POST["vendaS"]) ? $_POST["vendaS"] : null);
        $telefone = trim($_POST["telefone"]);
        $produtosFornecidos = isset($_POST["produtoF"]) ? $_POST["produtoF"] : null;


        $id_produto = $p->atualizarProdutor($id,$produtor,$site,$instagram,$cep,$logradouro,$numero,$complemento,$cidade,$estado,$longitude,$latitude,$turismoRural,$vendaFazenda,$vendaSite,$telefone,$email);

        $pp->DeletarPP($id);
        if (!empty($produtosFornecidos)) {
            foreach ($produtosFornecidos as $key => $v) {
                $pp->CadastrarPP($v,$id);
            }
        }
       header("location:tabela.php");
    }
    if (isset($_POST["altera_Comercio"])) {
        var_dump($_POST);
        $id = trim($_POST["id_PontoVenda"]);
        $nome =trim(isset($_POST["nome"]) ? $_POST["nome"] : null);
        $email = trim(isset($_POST["email"]) ? $_POST["email"] : null);
        $semana = trim(isset($_POST["semana"]) ? $_POST["semana"] : null);
        $inicio = trim(isset($_POST["horarioInicio"]) ? $_POST["horarioInicio"] : null);
        $termino =trim(isset($_POST["horarioTermino"]) ? $_POST["horarioTermino"] : null);
        $regiao = trim(isset($_POST["regiao"]) ? $_POST["regiao"] : null);
        $telefone =trim(isset($_POST["telefone"]) ? $_POST["telefone"] : null);
        $site =trim(isset($_POST["site"]) ? $_POST["site"] : null);
        $cep =trim(isset($_POST["cep"]) ? $_POST["cep"] : null);
        $logradouro =trim(isset($_POST["logradouro"]) ? $_POST["logradouro"] : null);
        $numero = trim(isset($_POST["numero"]) ? $_POST["numero"] : null);
        $complemento = trim(isset($_POST["complemento"]) ? $_POST["complemento"] : null);
        $longitude = trim(isset($_POST["longitude"]) ? $_POST["longitude"] : null);
        $latitude =trim(isset($_POST["latitude"]) ? $_POST["latitude"] : null);
        $cidade = trim(isset($_POST["cidade"]) ? $_POST["cidade"] : null);
        $estado = trim(isset($_POST["estado"]) ? $_POST["estado"] : null);
        $produtosFornecidos = isset($_POST["produtoF"]) ? $_POST["produtoF"] : null;
        $proCadastrado =trim( isset($_POST["produtor"]) ? $_POST["produtor"] : null);

       $pv->atualizarVenda($id,$nome, $inicio, $termino, $regiao, $telefone, $site, $cep, $logradouro, $numero, $complemento, $latitude, $longitude,$cidade, $estado,$semana,$proCadastrado,$email);

        $ppv->DeletarPPV($id);
        if (!empty($produtosFornecidos)) {
            foreach ($produtosFornecidos as $key => $v) {
                $ppv->CadastrarPPV($v, $id);
            }
        }

       header("location:tabelaComercio.php");
    }

?>