<?php
    require_once 'Class/ClassTipo.php';
    require_once 'Class/ClassProduto.php';
    $p = new ClassTipo("localhost", "leiteorganico", "postgres", "admin");
    $pro = new ClassProduto("localhost", "leiteorganico", "postgres", "admin");
    $t = isset($_POST["teste"]) ? $_POST["teste"] : null;
    $id_Tipo = isset($_GET["idTipo"]) ? $_GET["idTipo"] : null;

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    if ($id) {
        $p->ExcluirTipo($id);
        header("location:tabelaTipo.php");
    }
    $idTeste1 = isset($_GET["idProduto"]) ? $_GET["idProduto"] : null;
    if ($idTeste1) {
        $pro->ExcluirProduto($idTeste1);
        header("location:tabelaTipo.php");
    }

?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="shortcut icon" type="imagem/x-icon"/>
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/duasVias.css">
</head>


<body>
<?php

    if (isset($_POST["comercio"]) && !empty($_POST["comercio"])) {
        if (isset($_GET["idTipo"])) {
            $id_Tipo = $_GET["idTipo"];
            $comercio = $_POST["comercio"];

            $p->AlteraTipo($id_Tipo, $comercio);
            header("location:tabelaTipo.php");
        } else {
            $comercio = isset($_POST["comercio"]) ? $_POST["comercio"] : null;
            $p->CadastrarTipo($comercio);
            header("location:tabelaTipo.php");
        }

    }
    if (isset($_POST["produto"]) && !empty($_POST["produto"])) {
        if (isset($_GET["idProduto_editar"])) {
            $id_Produto = $_GET["idProduto_editar"];
            $produto = isset($_POST["produto"]) ? $_POST["produto"] : null;
            $pro->AlteraProduto($id_Produto, $produto);
            header("location:tabelaTipo.php");
        } else {
            $produto = isset($_POST["produto"]) ? $_POST["produto"] : null;
            $pro->CadastrarProduto($produto);
            header("location:tabelaTipo.php");
        }

    }

?>

<div class="seleMenu leite">
    <div class="nav justify-content-center" style="background-color: #eff5ee; margin-left:10%; margin-right:10%; padding:0.7%; ">
        <img src="imagem/logo.png " height="60pt" width="60pt" style=" border-radius: 50%;">
        <ul >
            <a type="button" class="btn btn-outline-success "href="formulario.php" >
                Formulario
            </a>
            <a type="button" class="btn btn-outline-success "href="tabelaTipo.php" >
                Tabela de controle
            </a>


            <div class="btn-group">
                <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Fazendeiro
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tabelaAprovado.php">Aprovado</a></li>
                    <li><a class="dropdown-item" href="tabela.php">Não Aprovado</a></li>

                </ul>
            </div>


            <div class="btn-group">
                <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Comerciante
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tabelaComercioAprovado.php">Aprovado</a></li>
                    <li><a class="dropdown-item" href="tabelaComercio.php">Não Aprovado</a></li>

                </ul>
            </div>
            <a type="button" class="btn btn-outline-success "href="MapaFazenda.php" >
                Mapa
            </a>


        </ul>

    </div>

</div>

<?php
    if (isset($_GET['idTipo']) && !empty($_GET['idTipo'])) {
        $id_Tipo = $_GET['idTipo'];
        $dadosTipo = $p->BuscarTipo($id_Tipo);
    }
    if (isset($_GET['idProduto_editar']) && !empty($_GET['idProduto_editar'])) {
        $id_P = $_GET['idProduto_editar'];
        $dadosProduto = $pro->BuscarElemento($id_P);
    }
?>

<section id="direita">
    <div style=" background-color: #9dad9d; margin-top:2%;margin-bottom: 1%; padding-left: 2%;padding-right: 2%;">

        <form method="POST">
            <div class="row g-3">

                <label for="comercio" class="col-sm-2 col-form-label"><h5>Comercio</h5></label>

                <div class="col-sm-7">
                    <input type="text" name="comercio" class="form-control" id="comercio"
                           value="<?php if (isset($dadosTipo)) {
                               echo $dadosTipo['venda'];
                           } ?>">
                </div>
                <input type="hidden" name="teste" id="teste" value="comer1">
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-outline-success"
                           value="<?php if (isset($dadosTipo)) {
                               echo "Atualizar";
                           } else {
                               echo "Cadastrar";
                           } ?>">
                </div>
            </div>
        </form>
    </div>
    <table class="table">

        <thead class="table-success">
        <tr>
            <th scope="col"> Codigo</th>
            <th scope="col" colspan="2">Tipo de Estabelecimento</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $dados = $p->BuscarTiposDados();

            if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $key => $v) {
                        echo " <th scope='row'>$v</th>";
                    }

                    ?>
                    <td>

                        <a type="button" class="btn btn-outline-primary"
                           href='tabelaTipo.php?idTipo= <?php echo $dados[$i]['id']; ?>'> Editar</a>
                        <a type="button" class="btn btn-outline-danger"
                           href="tabelaTipo.php?id= <?php echo $dados[$i]['id']; ?>">Excluir</a>
                    </td>
                    <?php
                    echo " </tr>";
                }
            }

        ?>

        </tbody>
    </table>
</section>
<section id="esquerda">
    <div style=" background-color: #9dad9d; margin-top:2%;margin-bottom: 1%; padding-left: 2%;padding-right: 2%;">
        <form method="POST">
            <div class="row g-3">

                <label for="produto" class="col-sm-2 col-form-label"><h5>Produto</h5></label>

                <div class="col-sm-7">
                    <input type="text" class="form-control" id="produto" name="produto"
                           value="<?php if (isset($dadosProduto)) {
                               echo $dadosProduto['produto'];
                           } ?>">
                </div>
                <input type="hidden" name="teste" value="pro1">
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-outline-success"
                           value="<?php if (isset($dadosProduto)) {
                               echo "Atualizar";
                           } else {
                               echo "Cadastrar";
                           } ?>">
                </div>
            </div>
        </form>
    </div>
    <table class="table">
        <thead class="table-success">
        <tr>
            <th scope="col"> Codigo</th>
            <th scope="col" colspan="2"> produto</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $informacao = $pro->BuscarProduto();

            if (count($informacao) > 0) {
                for ($i = 0; $i < count($informacao); $i++) {
                    echo "<tr>";
                    foreach ($informacao[$i] as $key => $v) {
                        echo " <th scope='row'>$v</th>";
                    }

                    ?>
                    <td>

                        <a type="button" class="btn btn-outline-primary"
                           href='tabelaTipo.php?idProduto_editar= <?php echo $informacao[$i]['id']; ?>'> Editar</a>
                        <a type="button" class="btn btn-outline-danger"
                           href="tabelaTipo.php?idProduto= <?php echo $informacao[$i]['id']; ?>">Excluir</a>
                    </td>
                    <?php
                    echo " </tr>";
                }
            }

        ?>

        </tbody>
    </table>

</section>


</body>
</html>