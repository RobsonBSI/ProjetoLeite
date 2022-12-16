<?php

    require_once 'Class/ClassProdutor.php';
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");

    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    if ($id) {
        $p->ExcluirProdutor($id);
        header("location:tabela.php");
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/mar.png"/>
</head>

<body>

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
                    Produtor
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



<div class="tabComp">
    <table class="table">
        <thead class="thead-dark">
        <tr class="table-success">


            <th scope="col">Nome</th>
            <th scope="col">Cidade</th>
            <th scope="col">Estado </th>
            <th scope="col" colspan="2">Data Aprovação</th>

        </thead>
        <tbody>
        <?php
            $dados = $p->BuscarAprovacaoP();

            if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo " <tr>";


                            foreach ($dados[$i] as $key => $v) {

                                if ($key=="nome"){
                                    echo" <td>".$v ."</td>";
                                }

                                if ($key=="cidade"){
                                    echo" <td>".$v ."</td>";
                                }

                                if ($key=="estado"){
                                    echo" <td>".$v ."</td>";
                                }
                                if ($key == "data_aprovacao") {
                                    echo " <td>" . $v . "</td>";
                                }
                            }


                            ?>
                            <td>

                                <a type="button" class="btn btn-outline-primary" href="EditarProdutor.php?id= <?php echo$dados[$i]['id'];?>"> Editar</a>
                                <a type="button" class="btn btn-outline-danger" href="tabela.php?id= <?php echo$dados[$i]['id'];?>">Excluir</a>


                            </td>
                            <?php


                    echo " </tr>";
                }
            }
        ?>


        </tbody>
    </table>

</div>
</body>
</html>
