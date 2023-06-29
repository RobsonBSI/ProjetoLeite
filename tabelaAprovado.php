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
    <link rel="stylesheet" href="css/MenuSecundario.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/LeiteBase.png"/>
    <link rel="stylesheet" href="css/Paginacao.css">
</head>

<body>

<div class="leite" >
    <img  src="imagem/logo3.png" width="20%" height= "80%"  style="float: left;padding-left:8%;" >
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


<div style="margin-left:20%;margin-right:20%;margin-top:3%">
    <?php

        $pag=isset($_GET["pagina"]) ? $_GET["pagina"] : null;

        if($pag==null){
            $pag = 1;
        }


    $aux =isset($_POST["indentificador"]) ? $_POST["indentificador"] : null;
        if($aux==null){

            $aux ="data_aprovacao";
        }
        $limite=10;
        $quantidade= $p->BuscarQuantidadeRegistro();
        $paginas=ceil($quantidade/$limite);
        $PaginaCarregada=($pag- 1)*$limite;


    $dados = $p->BuscarAprovacaoOrdenado($aux,$PaginaCarregada,$limite);
    ?>

    <table class="table">
        <thead class="thead-dark">
        <tr class="table-success">
        <form method="post" action="" name="" >
            <input type="hidden" name="indentificador" value="nome">
            <th scope="col"> <input type="submit"  class="btn btn-outline-info" value="Nome"></th>
        </form> 
        <form method="post" action="" name="">
            <input type="hidden" name="indentificador" value="cidade">
            <th scope="col"><input type="submit"  class="btn btn-outline-info" value="Cidade"></th> 
        </form>  
        <form method="post" action="" name="">
            <input type="hidden" name="indentificador" value="estado">
            <th scope="col"> <input type="submit"  class="btn btn-outline-info" value="Estado"></th>
        </form> 
        <form method="post" action="" name="">
            <input type="hidden" name="indentificador" value="data_aprovacao">
            <th scope="col" colspan="2"><input type="submit"   class="btn btn-outline-info"value="Data Aprovacao"></th> 
        </form>
           
      

        </thead>
        <tbody>
        <?php

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
    <div class="pag" >
        <a href="?pagina=1" class="linkP">Primeira Pagina</a>
        <?php if($pag > 1){ ?>
            <a  href="?pagina=<?=$pag-1?>" class="linkP"><<</a>
        <?php } ?>
        <?=$pag?>
        <?php if($pag < $paginas){ ?>
            <a href="?pagina=<?=$pag+1?>" class="linkP">>></a>
        <?php } ?>
        <?php if($paginas > 1){ ?>
            <a href="?pagina=<?=$paginas?>" class="linkP">Ultima Pagina</a>
        <?php } ?>
    </div>
</div>
</body>
</html>
