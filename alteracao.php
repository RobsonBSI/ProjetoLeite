<?php
    require_once 'Class/ClassProduto.php';
    require_once 'Class/ClassProdutor.php';
    require_once 'Class/ClassProduto_Produtor.php';

    $pro = new ClassProduto("localhost", "leiteorganico", "postgres", "admin");
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");
    $produto="";
    date_default_timezone_set('America/Fortaleza');
    $dCadastro= date('d/m/Y H:i:s' );
    var_dump($_POST);
    /*
    if (isset($_POST["altera_Produtor"])) {

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
        $dCadastro= date('d/m/Y H:i:s' );

        $id_produto= $p->CadastrarProdutor($produtor,$site,$instagram,$cep,$logradouro,$numero,$complemento,$cidade,$estado,$longitude,$latitude,$turismoRural,$vendaFazenda,$vendaSite,$telefone,$dCadastro);

        if (!empty($produtosFornecidos)){
            foreach ($produtosFornecidos as $key => $v) {
                $pp->CadastrarPP($v,$id_produto);
            }
        }
        header("location:formulario.php");
     }
*/

?>