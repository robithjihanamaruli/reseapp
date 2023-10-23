<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseapp</title>
    
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        html,
        body,
        #map {
            height: 100%;
        }
        .leaflet-control-locate {
          position: 'bottomright';
        }
        .popup-content {
        padding: 10px;
        }
        .popup-title {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .popup-description {
            margin-bottom: 10px;
            height: 80px;
            resize: vertical;
            white-space: normal; 
            word-wrap: break-word; 
        }
        .popup-save-button {
            display: block;
            margin-top: 10px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .leaflet-container :focus {
            outline-color: -webkit-focus-ring-color !important;
            outline-style: auto !important;
            outline-width: thin !important;
            outline: revert !important;
        }
    </style>
</head>
<body>
    <div id="map"></div>
</body>
</html>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet.pm@latest/dist/leaflet.pm.css">
<script src="https://unpkg.com/leaflet.pm@latest/dist/leaflet.pm.min.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<script src="https://cdn.jsdelivr.net/gh/robithjihanamaruli/longsor@main/geojson/rendahdata.js"></script>
<script src="https://cdn.jsdelivr.net/gh/robithjihanamaruli/longsor@main/geojson/sedangdata.js"></script>
<script src="https://cdn.jsdelivr.net/gh/robithjihanamaruli/longsor@main/geojson/tinggidata.js"></script>
<script src="https://cdn.jsdelivr.net/gh/robithjihanamaruli/longsor@main/geojson/sangattinggidata.js"></script>
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" />
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=" async defer></script>
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.13.0/leaflet-providers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.13.0/leaflet-providers.min.js"></script>
<script src="https://cdn.osmbuildings.org/OSMBuildings-Leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.browser.print@2.0.2/dist/leaflet.browser.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-styleeditor@latest/dist/css/Leaflet.StyleEditor.min.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet-styleeditor@latest/dist/javascript/Leaflet.StyleEditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-easyprint@2.1.9/dist/bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/leaflet-easyprint@2.1.9/libs/leaflet.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/gh/robithjihanamaruli/reseapp@main/nitipbentar/script.js"></script>