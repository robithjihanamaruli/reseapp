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
<script>
    var map = L.map('map').setView([-0.789275, 113.921327], 5);
    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {});
    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {maxZoom: 17,});
    var OpenStreetMap_CH = L.tileLayer('https://tile.osm.ch/switzerland/{z}/{x}/{y}.png', {maxZoom: 18,});
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'});
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']});
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']}).addTo(map);
    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {maxZoom: 17,});
    var osmb = new OSMBuildings(map).load();
    map.removeLayer(osmb);
    var rendahStyle = {
        "color": "#008000"
    };
    var rendahdata = L.geoJSON(rendahdata, {
        style: rendahStyle
    });
    var sedangStyle = {
        "color": "#90EE90"
    };
    var sedangdata = L.geoJSON(sedangdata, {
        style: sedangStyle
    });
    var tinggiStyle = {
        "color": "#ffa500"
    };
    var tinggidata = L.geoJSON(tinggidata, {
        style: tinggiStyle
    });
    var sangattinggiStyle = {
        "color": "#FF0000"
    };
    var sangattinggidata = L.geoJSON(sangattinggidata, {
        style: sangattinggiStyle
    });
    var baseLayers = {
        "Satellite":googleSat,
    };

    var overlays = {
        '3D Buildings': osmb,
        'Esri WorldImagery': Esri_WorldImagery,
        "Google Map":googleStreets,
        "OpenTopoMap": OpenTopoMap,
        "OpenStreetMap": OpenStreetMap_CH,
            "Rendah": rendahdata,
            "Sedang": sedangdata,
            "Tinggi": tinggidata,
            "Sangat Tinggi": sangattinggidata
    };
    L.control.layers(baseLayers, overlays).addTo(map);
    L.Control.geocoder().addTo(map);
    L.control.scale({
        position: 'bottomleft'
    }).addTo(map);
    var options = {
        position: 'topleft', 
        drawMarker: false, 
        drawPolyline: true, 
        drawRectangle: false, 
        drawCircleMarker: true, 
        drawPolygon: true, 
        drawCircle: false, 
        cutPolygon: true, 
        editMode: false, 
        removalMode: true 
    };
    var drawControl = map.pm.addControls(options);
        map.on('pm:create', function (event) {
            var layer = event.layer;
            var shape = event.shape;
            if (shape === 'CircleMarker') {
                layer.pm.disable();
            }
            var popupContent = document.createElement('div');
            popupContent.className = 'popup-content';
            var titleInput = document.createElement('input');
            titleInput.type = 'text';
            titleInput.placeholder = 'Judul';
            titleInput.className = 'popup-title';
            popupContent.appendChild(titleInput);
            var descriptionContainer = document.createElement('div');
            descriptionContainer.className = 'popup-description';
            popupContent.appendChild(descriptionContainer);
            var descriptionEditor = new Quill(descriptionContainer, {
                theme: 'snow',
                placeholder: 'Deskripsi',
                readOnly: false, 
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],  
                        ['link', 'image'],                          
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }], 
                        ['blockquote', 'code-block'],               
                        ['video'],                                  
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],  
                        [{ 'align': [] }],                          
                        ['clean']                                   
                    ],
                },
            });
            window.addEventListener('DOMContentLoaded', function() {
              var saveButton = document.querySelector('.save-button');
              if (saveButton) {
                saveButton.addEventListener('click', function() {
                  var descriptionContent = descriptionEditor.root.innerHTML;
                  var videoRegex = /<iframe.*?src="(.*?)".*?><\/iframe>/g;
                  var videoMatch = videoRegex.exec(descriptionContent);
                  var videoUrl = videoMatch && videoMatch[1];
                  if (videoUrl) {
                    var videoContainer = document.createElement('div');
                    videoContainer.innerHTML = `<iframe src="${videoUrl}" frameborder="0" allowfullscreen></iframe>`;
                    popupContent.appendChild(videoContainer);
                  }
                  descriptionContent = descriptionContent.replace(videoRegex, '');
                });
              }
            });
            var saveButton = document.createElement('button');
            saveButton.textContent = 'Save';
            saveButton.className = 'popup-save-button';
            saveButton.addEventListener('click', function() {
                var title = titleInput.value;
                var description = descriptionEditor.root.innerHTML;
                var coordinates;
                switch (shape) {
                    case 'Polyline':
                    case 'Polygon':
                        coordinates = JSON.stringify(layer.getLatLngs());
                        break;
                    case 'CircleMarker':
                        coordinates = JSON.stringify(layer.getLatLng());
                        break;
                    default:
                        coordinates = '';
                }
                var popupContent = title + "<br>" +
                    description + "<br>";
                layer.bindPopup(popupContent);
            });
            popupContent.appendChild(saveButton);
            layer.bindPopup(popupContent).openPopup();
        });
var locate = L.control.locate({
          position: 'bottomright', 
          strings: {
            title: "Show me where I am, yo!"
          }
        }).addTo(map);
L.control.zoom({
          position:'bottomright',
          maxZoom: 20,
        }).addTo(map);
        var zoomControl = map.zoomControl;
        map.removeControl(zoomControl);
L.control.browserPrint().addTo(map);
        map.on("browser-print-start", function(e){
        });
L.control.polylineMeasure ({position:'topright', unit:'kilometres', showBearings:false, clearMeasurementsOnStop: false, showClearControl: true, showUnitControl: false}).addTo (map); 
        var satMutant = L.gridLayer.googleMutant({
                maxZoom: 24,
                type: "satellite",
            });

            var hybridMutant = L.gridLayer.googleMutant({
                maxZoom: 24,
                type: "hybrid",
            });

    var styleEditor = L.control.styleEditor({
        position: "topleft",
        useGrouping: false,
        openOnLeafletDraw: true,
    });
    map.addControl(styleEditor);
    /*var printer = L.easyPrint({
        sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
        filename: 'myMap',
        exportOnly: true,
        hideControlContainer: true
    }).addTo(map);*/

</script>