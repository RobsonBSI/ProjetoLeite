<?php
    require_once 'Class/ClassProdutor.php';
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    require_once 'Class/ClassPontoVenda.php';
    $pv = new ClassPontoVenda("localhost", "leiteorganico", "postgres", "admin");
    require_once 'Class/ClassProduto_Ponto_Venda.php';
    $ppv = new ClassProduto_Ponto_Venda("localhost", "leiteorganico", "postgres", "admin");
    require_once 'Class/ClassProduto_Produtor.php';
    $pp = new ClassProduto_Produtor("localhost", "leiteorganico", "postgres", "admin");
?>

<!doctype html>
<html lang="pt-br">
<head>
    <style>
        #map {
            height: 800px;
            width: 1200px;
        }
    </style>
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="js/JQuery.js"></script><!--Versão 3.1.0-->
    <script src="js/layout.js"></script>
    <link rel="stylesheet" href="css/MenuSecundario.css">
    <link rel="shortcut icon" type="imagem/x-icon" href="imagem/LeiteBase.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="css/estiloLateral.css" rel="stylesheet">


</head>
<body>

<?php
    $mer='';
    $fei='';
    $onl= '';
    $ces='';
    $faz= '';
    if (isset($_POST["envia_Mapa"])) {

    }
    if (isset($_POST["envia_Mapa"])) {
        if (isset($_POST["fazenda"])) {
            if ($_POST['fazenda'] == 'on') {
                $faz = 'on';
            }


        }
        $mer= isset($_POST["venda"]) ? $_POST["venda"] : null;
        $fei =isset($_POST["feira"]) ? $_POST["feira"] : null;
        $onl=isset($_POST["online"]) ? $_POST["online"] : null;
        $ces=isset($_POST["cesta"]) ? $_POST["cesta"] : null;
    } else {

        $faz='on';

    }



?>
<nav>
    <ul>
        <li class="logo">  <img  src="imagem/logo3.png" width="20%" height= "80%"  style="float: left;padding-left:8%;" ></li>

        <div style="margin-left:6%; margin-right: 10%; padding-left:5%;color: #f6f4f4">
            <div style="margin-left:6%; margin-right: 10%; padding-left:5%;color: #f6f4f4">
                <form method="post" action="" name="">
                    <li > <input type="checkbox" id="escolha2" name="fazenda" value="on"  <?php echo $faz == 'on'? 'checked' : ''; ?>> <img src="imagem/fazenda 2.png" width="14%" height="14%"> Fazendas</li>
                    <li > <input type="checkbox" id="escolha1" name="feira" value="on"  <?php echo $fei == 'on'? 'checked' : ''; ?>>  <img src="imagem/feira.png" width="14%" height="14%">Feiras</li>
                    <li > <input type="checkbox" id="escolha3" name="online" value="on"  <?php echo $onl == 'on'? 'checked' : ''; ?>> <img src="imagem/vOnline.png" width="14%" height="14%"> Vendas online </li>
                    <li ><input type="checkbox" id="escolha4" name="cesta" value="on" <?php echo $ces == 'on'? 'checked' : ''; ?>>  <img src="imagem/cesta.png" width="14%" height="14%">Cestas</li>
                    <li ><input type="checkbox"id="escolha5" name="venda" value="on"  <?php echo $mer == 'on'? 'checked' : ''; ?>>  <img src="imagem/mercado.png" width="14%" height="14%">Mercados</li>
                    <li ><input type="submit" name="envia_Mapa" value="criar mapa">
                </form>

            </div>
            <div style="padding-top:50%">
                <a type="button" class="btn btn-outline-light" href="https://leiteorganico.cnpgl.embrapa.br/" style="margin-bottom:10%"> Voltar Para a pagima inicial</a>
            </div>
    </ul>
</nav>



<div class="wrapper">
    <div class="section">
        <div class="box-area" style="margin-left: auto; margin-top:2%;">




            <?php
                $dados = $p->BuscarAprovacaoP();
                $dados1 = $pv->BuscarAprovacao();


                for ($i = 0; $i < count($dados); $i++) {
                    foreach ($dados[$i] as $key => $v) {
                        if ($key == "id") {
                            $id2 = $v;
                        }
                        if ($key == "nome") {
                            $nome = $v;
                        }
                        if ($key == "site") {
                            $site = $v;
                        }
                        if ($key == "instagran") {
                            $insta = $v;
                        }
                        if ($key == "cep") {
                            $cep = $v;
                        }
                        if ($key == "logradouro") {
                            $logra = $v;
                        }
                        if ($key == "numero") {
                            $numero = $v;
                        }
                        if ($key == "complemento") {
                            $comp = $v;
                        }
                        if ($key == "cidade") {
                            $cidade = $v;
                        }
                        if ($key == "estado") {
                            $estado = $v;
                        }
                        if ($key == "longitude") {
                            $longitude = $v;
                        }
                        if ($key == "latitude") {
                            $latitude = $v;
                        }

                        if ($key == "turismo") {
                            if ($v == "True") {
                                $turismo = "Sim";
                            } else {
                                $turismo = "Não";
                            }
                        }
                        if ($key == "fazenda") {
                            if ($v == "True") {
                                $VendaFazenda = "Sim";
                            } else {
                                $VendaFazenda = "Não";
                            }
                        }
                        if ($key == "online") {
                            if ($v == "True") {
                                $VendaOline = "Sim";
                            } else {
                                $VendaOline= "Não";
                            }

                        }

                        if ($key == "telefone") {
                            $telefone = $v;
                        }



                    }

                    $informa1=$pp->BuscarPP($id2);
                    for ($l = 0; $l < count($informa1); $l++) {
                        foreach ( $informa1[$l] as $k6 => $v8) {
                            if ($k6== "produto") {
                                if (empty($Produto)) {
                                    $Produto= $v8;
                                } else {
                                    $Produto =  $Produto . " - " . $v8;
                                }
                            }
                        }
                    }

                    $endereco = "CEP: " . $cep . " - " . $logra . " N° " . $numero . " " . $comp . " - " . $cidade . " - " . $estado;

                    $fazendas[$i] = array($nome, $endereco, $telefone, $site, $insta, $longitude, $latitude, $turismo, $VendaFazenda,$VendaOline,$Produto);
                    $Produto='';
                }
                for ($j = 0; $j < count($dados1); $j++) {
                    foreach ($dados1[$j] as $k => $h) {
                        if ($k == "id") {
                            $id1 = $h;
                        }
                        if ($k == "nome") {
                            $nome1 = $h;
                        }
                        if ($k == "semana") {
                            $sema = $h;
                        }
                        if ($k == "inicio") {
                            $incio = $h;
                        }
                        if ($k == "termino") {
                            $termino = $h;
                        }
                        if ($k == "regiao") {
                            $reg = $h;
                        }
                        if ($k == "telefone") {
                            $telefone1 = $h;
                        }
                        if ($k == "site") {
                            $site1 = $h;
                        }

                        if ($k == "cep") {
                            $cep1 = $h;
                        }
                        if ($k == "logradouro") {
                            $logra1 = $h;
                        }
                        if ($k == "numero") {
                            $numero1 = $h;
                        }
                        if ($k == "complemento") {
                            $comp1 = $h;
                        }
                        if ($k == "latitude") {
                            $latitude1 = $h;
                        }
                        if ($k == "longitude") {
                            $longitude1 = $h;
                        }
                        if ($k == "cidade") {
                            $cidade1 = $h;
                        }
                        if ($k == "estado") {
                            $estado1 = $h;
                        }
                        if ($k == "produtor") {
                            $produtor = $h;
                        }
                        if ($k == "venda") {
                            $venda = $h;
                        }


                    }
                    $informa=$ppv->BuscarComercioProduto($id1);
                    for ($k = 0; $k < count($informa); $k++) {
                        foreach ( $informa[$k] as $k1 => $v2) {
                            if ($k1== "produto") {
                                if (empty($Produto)) {
                                    $Produto= $v2;
                                } else {
                                    $Produto =  $Produto . " - " . $v2;
                                }
                            }
                        }
                    }

                    $endr = "CEP: " . $cep1 . " - " . $logra1 . " N° " . $numero1 . "  " . $comp1 . " - " . $cidade1 . " - " . $estado1;

                    $comercio[$j] = array($venda, $nome1, $endr, $incio, $termino, $sema, $telefone1, $site1, $reg, $latitude1, $longitude1, $produtor,$Produto);
                    $Produto='';
                }
            ?>
            <h2 style="color: #2b2626; font-family: Arial, Helvetica, sans-serif;font-size: 25px ">Mapa - fazendas e pontos de venda de lácteos orgânicos</h2>
            <div align="center">

                <h3></h3>
            </div>
            <div align="center">
                <div id="map"></div>
                <hr width="900"/>
            </div>
            <script>

                function initMap() {
                    var brasil = {lat: -21.010170, lng: -45.417042};
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: brasil
                    });
                    const Mercado = {
                        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                        fillColor: "rgba(252,248,247,0.04)",
                        fillOpacity: 0.8,
                        strokeColor: "#0f59d9",
                        rotation: 0,
                        scale: 5,

                    };
                    const VendaFazenda = {
                        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                        fillColor: "rgba(252,248,247,0.04)",
                        fillOpacity: 0.8,
                        strokeColor: "#2a5202",
                        rotation: 0,
                        scale: 5,

                    };
                    const Cesta = {
                        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                        fillColor: "rgba(252,248,247,0.04)",
                        fillOpacity: 0.8,
                        strokeColor: "#bc06f8",
                        rotation: 0,
                        scale: 5,

                    };
                    const Feira = {
                        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                        fillColor: "rgba(252,248,247,0.04)",
                        fillOpacity: 0.8,
                        strokeColor: "#ff0000",
                        rotation: 0,
                        scale: 5,

                    };
                    const VendaOnline = {
                        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                        fillColor: "rgba(252,248,247,0.04)",
                        fillOpacity: 0.8,
                        strokeColor: "#f1950a",
                        rotation: 0,
                        scale: 5,

                    };

                    <?php


                    $j = 0;
                    foreach ($comercio as $comer) {

                        $Tipo = $comer[0];
                        $nome_Comercio = $comer[1];
                        $localidade = $comer[2];
                        $hI = $comer[3];
                        $hT = $comer[4];
                        $sema = $comer[5];
                        $tel1 = $comer[6];
                        $sit = $comer[7];
                        $regiao1 = $comer[8];
                        $lat1 = $comer[9];
                        $long2 = $comer[10];
                        $pdr = $comer[11];
                        $prod = $comer[12];


                        if($mer == 'on' && $Tipo=='Mercado' ){
                            echo "var latLng = new google.maps.LatLng(" . $lat1 . "," . $long2 . ");";
                            echo "\n";


                            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
            icon: Mercado,
                map: map,
                title: '" .$nome_Comercio . "'
        });";
                            echo "\n";

                            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_Comercio . "</h1>'+
        '<div id=\"bodyContent\" style=\" text-align:justify\">'+
    
    
        '<p><b>site: </b> " . $sit . "</p>' +
        '<p><b>Produtor: </b>".$pdr. "  </p>' +
        '<p><b>Produto: </b>".$prod. "  </p>' +
 
       '<p><b> <a href=\" https://www.google.com/maps/search/?api=1&query=". $lat1."%2C". $long2 ."  \" target=\"_blank \"> acesse o googlo Maps</a></b> </p>' +
        '</div>'+
        '</div>';";
                            echo "\n";

                            echo "var infowindow" . $j . " = new google.maps.InfoWindow({
        content: contentString" . $j . "
    });";

                            echo "\n";

                            echo "marker" . $j . ".addListener('click', function() {
    infowindow" . $j . ".open(map, marker" . $j . ");
    });";
                            // incrementa contador de iteracoes
                            $j++;


                        }

                        if($fei == 'on' && $Tipo=='Feira'){
                            echo "var latLng = new google.maps.LatLng(" . $lat1 . "," . $long2 . ");";
                            echo "\n";


                            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
            icon: Feira,
                map: map,
                title: '" .$nome_Comercio . "'
        });";
                            echo "\n";

                            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_Comercio . "</h1>'+
        '<div id=\"bodyContent\" style=\" text-align:justify\">'+
        
    
       '<p><b>Produtor: </b>".$pdr. "  </p>' +
      '<p><b>Produto: </b>".$prod. "  </p>' +
        '<p><b>Dias da semana que trabalha: </b> " .$sema . "</p>' +
        '<p><b>Horario Inicio: </b> " . $hI . "<b> Horario de termino:</b> " . $hT . "</p>' +
         '<p><b> <a href=\" https://www.google.com/maps/search/?api=1&query=". $lat1."%2C". $long2 ."  \" target=\"_blank \"> acesse o googlo Maps</a></b> </p>' +
        
       
        '</div>'+
        '</div>';";
                            echo "\n";

                            echo "var infowindow" . $j . " = new google.maps.InfoWindow({
        content: contentString" . $j . "
    });";

                            echo "\n";

                            echo "marker" . $j . ".addListener('click', function() {
    infowindow" . $j . ".open(map, marker" . $j . ");
    });";
                            // incrementa contador de iteracoes
                            $j++;



                        }


                        if($ces == 'on'  && $Tipo== 'Cesta'){
                            echo "var latLng = new google.maps.LatLng(" . $lat1 . "," . $long2 . ");";
                            echo "\n";


                            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
            icon: Cesta,
                map: map,
                title: '" .$nome_Comercio . "'
        });";
                            echo "\n";

                            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_Comercio . "</h1>'+
        '<div id=\"bodyContent\" style=\" text-align:justify\">'+
   
     
         '<p><b>site: <a href=\"$sit. \"  target=\"_blank\" > </b> " .$sit. "</a> </p>' +
        '<p><b>Região de Atendimento: </b> " . $regiao1 . "</p>' +
          '<p><b>Produtor: </b>".$pdr. "  </p>' +
          '<p><b>Produto: </b>".$prod. "  </p>' +
         '<p><b> <a href=\" https://www.google.com/maps/search/?api=1&query=". $lat1."%2C". $long2 ."  \" target=\"_blank \"> acesse o googlo Maps</a></b> </p>' +
       
        '</div>'+
        '</div>';";
                            echo "\n";

                            echo "var infowindow" . $j . " = new google.maps.InfoWindow({
        content: contentString" . $j . "
    });";

                            echo "\n";

                            echo "marker" . $j . ".addListener('click', function() {
    infowindow" . $j . ".open(map, marker" . $j . ");
    });";
                            // incrementa contador de iteracoes
                            $j++;


                        }




                        if($onl == 'on' && $Tipo== 'Venda online' ){
                            echo "var latLng = new google.maps.LatLng(" . $lat1 . "," . $long2 . ");";
                            echo "\n";


                            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
            icon: VendaOnline,
                map: map,
                title: '" .$nome_Comercio . "'
        });";
                            echo "\n";

                            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_Comercio . "</h1>'+
        '<div id=\"bodyContent\" style=\" text-align:justify\">'+
        
        
         '<p><b>site: <a href=\"$sit. \"  target=\"_blank\" > </b> " .$sit. "</a> </p>' +
      '<p><b>Produto: </b>".$prod. "  </p>' +
        '<p><b>Produtor: </b>".$pdr. "  </p>' +
        '<p><b> <a href=\" https://www.google.com/maps/search/?api=1&query=". $lat1."%2C". $long2 ."  \" target=\"_blank \"> acesse o googlo Maps</a></b> </p>' +
        '</div>'+
        '</div>';";
                            echo "\n";

                            echo "var infowindow" . $j . " = new google.maps.InfoWindow({
        content: contentString" . $j . "
    });";

                            echo "\n";

                            echo "marker" . $j . ".addListener('click', function() {
    infowindow" . $j . ".open(map, marker" . $j . ");
    });";
                            // incrementa contador de iteracoes
                            $j++;


                        }

                    } // fim foreach




                    foreach ($fazendas as $fazenda) {

                        $nome_fazenda = $fazenda[0];
                        $end = $fazenda[1];
                        $tel = $fazenda[2];
                        $si = $fazenda[3];
                        $ins = $fazenda[4];
                        $long = $fazenda[5];
                        $lat = $fazenda[6];
                        $tur = $fazenda[7];
                        $VF = $fazenda[8];
                        $VO = $fazenda[9];
                        $pro = $fazenda[10];
                        if($faz == 'on' ){
                            echo "var latLng = new google.maps.LatLng(" . $lat . "," . $long . ");";
                            echo "\n";

                            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
             icon: VendaFazenda,
                map: map,
                title: '" . $nome_fazenda . "'
        });";
                            echo "\n";

                            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_fazenda . "</h1>'+
        '<div id=\"bodyContent\" style=\" text-align:justify\">'+
        
        '<p><b>site: <a href=\"$si. \"  target=\"_blank\" > </b> " . $si . "</a> </p>' +
        '<p><b>Instagran: </b> " . $ins . "</p>' +
        '<p><b>Produto Fornecido: </b>".$pro. "  </p>' +
        '<p><b>Possui venda na propriedade?: </b> " . $VF . "</p>' +
        '<p><b>Possui vendas Online?: </b> " . $VO . "</p>' +
        '<p><b>Possui turismo rural? </b> " . $tur . "</p>' +
        '<p><b> <a href=\" https://www.google.com/maps/search/?api=1&query=". $lat ."%2C". $long ."  \" target=\"_blank \"> acesse o googlo Maps</a></b> </p>' +
        '</div>'+
        '</div>';";
                            echo "\n";

                            echo "var infowindow" . $j . " = new google.maps.InfoWindow({
        content: contentString" . $j . "
    });";

                            echo "\n";

                            echo "marker" . $j . ".addListener('click', function() {
    infowindow" . $j . ".open(map, marker" . $j . ");
    });";

                            $j++;
                        }
                    } // fim foreach

                    ?>


                } // fim initmap
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbNrEsfyvZCX_jhjZrCJAU0M04GeK9LcY&callback=initMap">
            </script>
        </div>
    </div>
</div>
</body>
</html>


