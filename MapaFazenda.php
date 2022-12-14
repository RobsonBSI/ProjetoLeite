<?php
    require_once 'Class/ClassProdutor.php';
    $p = new ClassProdutor("localhost", "leiteorganico", "postgres", "admin");
    require_once 'Class/ClassPontoVenda.php';
    $pv = new ClassPontoVenda("localhost", "leiteorganico", "postgres", "admin");

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        #map {
            height: 600px;
            width: 900px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="shortcut icon" type="imagem/x-icon"/>
    <title>Leite Organico</title>
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
    $dados = $p->BuscarAprovacaoP();
    $dados1 = $pv->BuscarAprovacao();

    for ($i = 0; $i < count($dados); $i++) {
        foreach ($dados[$i] as $key => $v) {
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
            if ($key == "logradouto") {
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
                    $VendaOnline = "Não";
                }

            }

            if ($key == "telefone") {
                $telefone = $v;
            }
            if ($key == "produto") {
                $produto = $v;
            }


        }
        $endereco = "CEP: " . $cep . " - " . $logra . " N° " . $numero . " " . $comp . " - " . $cidade . " - " . $estado;

        $fazendas[$i] = array($nome, $endereco, $telefone, $site, $insta, $produto, $longitude, $latitude, $turismo, $VendaFazenda, $VendaOline);
    }
    for ($j = 0; $j < count($dados1); $j++) {
        foreach ($dados1[$j] as $k => $h) {

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
            if ($k == "venda") {
                $venda = $h;
            }

        }
        $endr = "CEP: " . $cep1 . " - " . $logra1 . " N° " . $numero1 . "  " . $comp1 . " - " . $cidade1 . " - " . $estado1;

        $comercio[$j] = array($venda, $nome1, $endr, $incio, $termino, $sema, $telefone1, $site1, $reg, $latitude1, $longitude1);
    }
?>
<div align="center">

    <h3>Mapa  de leite  orgânico</h3>
</div>
<div align="center">
    <div id="map"></div>
    <hr width="900"/>
</div>
<script>
    // Funcao que inicializa o mapa
    // O parametro uluru marca o centro do mapa
    // O parametro zoom indica o nivel de zoom do mapa
    function initMap() {
        var uluru = {lat: -21.010170, lng: -45.417042};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: uluru
        });

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

            echo "var latLng = new google.maps.LatLng(" . $lat1 . "," . $long2 . ");";
            echo "\n";


            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
                map: map,
                title: '" .$nome_Comercio . "'
        });";
            echo "\n";

            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_Comercio . "</h1>'+
        '<div id=\"bodyContent\">'+
        '<p><b>Endereço: </b> " .  $localidade. "</p>' +
        '<p><b>Contato: </b> " .  $tel1 . "</p>' +
        '<p><b>site: </b> " . $sit . "</p>' +
        '<p><b>Instagran: </b> " . $regiao1 . "</p>' +
        '<p><b>Tipos de lácteos produzidos: </b> " . $hI . "</p>' +
        '<p><b>Possui venda na propriedade?: </b> " . $hT . "</p>' +
        '<p><b>Possui vendas Online?: </b> " .$sema . "</p>' +
       
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
        } // fim foreach



        foreach ($fazendas as $fazenda) {

            $nome_fazenda = $fazenda[0];
            $end = $fazenda[1];
            $tel = $fazenda[2];
            $si = $fazenda[3];
            $ins = $fazenda[4];
            $pro = $fazenda[5];
            $long = $fazenda[6];
            $lat = $fazenda[7];
            $tur = $fazenda[8];
            $VF = $fazenda[9];
            $VO = $fazenda[10];

            echo "var latLng = new google.maps.LatLng(" . $lat . "," . $long . ");";
            echo "\n";

            echo "var marker" . $j . " = new google.maps.Marker({
            position: latLng,
                map: map,
                title: '" . $nome_fazenda . "'
        });";
            echo "\n";

            echo "var contentString" . $j . "  = '<div id=\"content\">'+
        '<div id=\"siteNotice\">'+
        '</div>'+
        '<h1 id=\"firstHeading\" class=\"firstHeading\">" . $nome_fazenda . "</h1>'+
        '<div id=\"bodyContent\">'+
        '<p><b>Endereço: </b> " . $end . "</p>' +
        '<p><b>Contato: </b> " . $tel . "</p>' +
        '<p><b>site: </b> " . $si . "</p>' +
        '<p><b>Instagran: </b> " . $ins . "</p>' +
        '<p><b>Tipos de lácteos produzidos: </b> " . $pro . "</p>' +
        '<p><b>Possui venda na propriedade?: </b> " . $VF . "</p>' +
        '<p><b>Possui vendas Online?: </b> " . $VO . "</p>' +
        '<p><b>Possui turismo rural? </b> " . $tur . "</p>' +
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
        } // fim foreach

        ?>


    } // fim initmap
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbNrEsfyvZCX_jhjZrCJAU0M04GeK9LcY&callback=initMap">
</script>
</body>
</html>
