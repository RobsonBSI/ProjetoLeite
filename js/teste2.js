
function initMap() {
    const uluru = new google.maps.LatLng(-21.74437089181318,-43.35431368068462);
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: uluru,
    });
    const Mercado = {
        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
        fillColor: "#4be30c",
        fillOpacity: 0.8,
        strokeColor: "#2a4426",
        rotation: 0,
        scale: 5,

    };
    const VendaFazenda = {
        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
        fillColor: "#ff7733",
        fillOpacity: 0.8,
        strokeColor: "#993300",
        rotation: 0,
        scale: 5,

    };
    const Cesta = {
        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
        fillColor: "#8499e8",
        fillOpacity: 0.8,
        strokeColor: "#0638f8",
        rotation: 0,
        scale: 5,

    };
    const Feira = {
        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
        fillColor: "#f5e592",
        fillOpacity: 0.8,
        strokeColor: "yellow",
        rotation: 0,
        scale: 5,

    };
    const VendaOnline = {
        path:google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
        fillColor: "#f193f0",
        fillOpacity: 0.8,
        strokeColor: "#ff0000",
        rotation: 0,
        scale: 5,

    };


    const contentString =
        '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h1 id="firstHeading" class="firstHeading">teste</h1>' +
        '<div id="bodyContent">' +
        '<p><b>Contato: </b>  (32)99999-9999</p>' +
        '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
        "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
        "(last visited June 22, 2009).</p>" +
        "</div>" +
        "</div>";
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: "Uluru",
    });
    const marker = new google.maps.Marker({
        position: uluru,
        icon: Mercado,
        map,
        title: "Uluru (Ayers Rock)",
    });

    marker.addListener("click", () => {
        infowindow.open({
            anchor: marker,
            map,
        });
    });
}

window.initMap = initMap;