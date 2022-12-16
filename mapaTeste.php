<html>
<head>
    <title>Custom Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        #map {
            height: 800px;
            width: 1200px;
        }
    </style>
    <script type="module" src="js/MapaLayout.js"></script>
</head>
<body>
<div id="map"></div>

<!--
  The `defer` attribute causes the callback to execute after the full HTML
  document has been parsed. For non-blocking uses, avoiding race conditions,
  and consistent behavior across browsers, consider loading using Promises
  with https://www.npmjs.com/package/@googlemaps/js-api-loader.
  -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
        defer
></script>
</body>
</html>