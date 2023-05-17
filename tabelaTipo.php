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
    <link rel="stylesheet" href="css/MenuSecundario.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/LeiteBase.png"/>
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
<div class="leite" >
    <img  src="imagem/logo3.png" width="20%" height= "100%"  style="float: left;padding-left:8%;" >
    <div class="seleMenu ">
    <div class="nav justify-content-center" style="margin-left:18%; margin-right:10%; padding:0.7%; ">

        <ul >
            <a type="button" class="btn btn-outline-light "href="formulario.php" >
                Formulario
            </a>
            <a type="button" class="btn btn-outline-light "href="tabelaTipo.php" >
                Tabela de controle
            </a>


            <div class="btn-group">
                <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Fazendeiro
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tabelaAprovado.php">Aprovado</a></li>
                    <li><a class="dropdown-item" href="tabela.php">Não Aprovado</a></li>

                </ul>
            </div>


            <div class="btn-group">
                <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Comerciante
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tabelaComercioAprovado.php">Aprovado</a></li>
                    <li><a class="dropdown-item" href="tabelaComercio.php">Não Aprovado</a></li>

                </ul>
            </div>
            <a type="button" class="btn btn-outline-light "href="MapaFazenda.php" >
                Mapa
            </a>

            <a type="button" class="btn btn-outline-light" href="https://leiteorganico.cnpgl.embrapa.br/">Volta para site</a>
        </ul>
    </div>
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


<div >
    <div style=" background-color:#003e81; margin-top:2%;margin-bottom: 1%; padding-left: 2%;padding-right: 2%;">
        <form method="POST">
            <div class="row g-3">

                <label for="produto" class="col-sm-2 col-form-label"><h5 style="color: #f6f4f4">Produto</h5></label>

                <div class="col-sm-7">
                    <input type="text" class="form-control" id="produto" name="produto"
                           value="<?php if (isset($dadosProduto)) {
                               echo $dadosProduto['produto'];
                           } ?>">
                </div>
                <input type="hidden" name="teste" value="pro1">
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-outline-light"
                           value="<?php if (isset($dadosProduto)) {
                               echo "Atualizar";
                           } else {
                               echo "Cadastrar";
                           } ?>">
                </div>
            </div>
        </form>
    </div>
    <div style="margin-left:20%;margin-right:20%;">
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

                    </td>
                    <?php
                    echo " </tr>";
                }
            }

        ?>

        </tbody>
    </table>
    </div>
</div>


</body>
</html>