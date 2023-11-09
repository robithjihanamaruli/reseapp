var map = L.map('map').setView([-0.789275, 113.921327], 5);
map.addControl(new L.Control.Fullscreen({
        title: {
            'false': 'View Fullscreen',
            'true': 'Exit Fullscreen',
            position: 'top right'
        }
    }));
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
                console.log(title);
                var description = descriptionEditor.root.innerHTML;
                console.log(description);
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
