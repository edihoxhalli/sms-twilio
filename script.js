var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var osmAttrib='Map data © <a href="http://osm.org/copyright">OpenStreetMap</a> contributors';
var osm = new L.TileLayer(osmUrl, {
    attribution: osmAttrib,
    detectRetina: true
});

var token = 'pk.eyJ1IjoiZG9tb3JpdHoiLCJhIjoieENoTEhXUSJ9.kjCosRk1pmnOqTvfsjmgIg';
var mapboxUrl = 'http://api.tiles.mapbox.com/v4/mapbox.streets/{z}/{x}/{y}@2x.png?access_token=' + token;
var mapboxAttrib = 'Map data © <a href="http://osm.org/copyright">OpenStreetMap</a> contributors. Tiles from <a href="https://www.mapbox.com">Mapbox</a>.';
var mapbox = new L.TileLayer(mapboxUrl, {
  attribution: mapboxAttrib
});

var map = new L.Map('map', {
    layers: [mapbox],
    center: [51.505, -0.09],
    zoom: 10,
    zoomControl: true
});

// add location control to global name space for testing only
// on a production site, omit the "lc = "!
lc = L.control.locate({
    follow: true,
    strings: {
        title: "Show my location!"
    }
}).addTo(map);

map.on('startfollowing', function() {
    map.on('dragstart', lc._stopFollowing, lc);
}).on('stopfollowing', function() {
    map.off('dragstart', lc._stopFollowing, lc);
});


var jsonLayer;
var selected;
var minZoom = 8;

var center = new L.LatLng(-104.99404, 39.75621);//34.05246386116084,-118.24546337127686);


map.setView(center, minZoom);
tiles = new L.TileLayer("http://{s}.latimes.com/quiet-la-0.4.0/{z}/{x}/{y}.png", {
    attribution: "Map data (c) <a href='http://www.openstreetmap.org/'>OpenStreetMap</a> contributors, <a href='http://creativecommons.org/licenses/by-sa/2.0/'>CC-BY-SA</a>",
    subdomains: [
        'tiles1',
        'tiles2',
        'tiles3',
        'tiles4'
    ]
});
map.addLayer(tiles);






var defaultStyle = {
    weight: 1,
    color: "#2662CC",
    opacity: 0.75,
    fill: true,
    fillColor: "#2262CC",
    fillOpacity: 0.2
};

var highlightStyle = {
    weight: 3,
    color: "#244f79",
    opacity: 1,
    fill: true,
    fillColor: "#2262CC",
    fillOpacity: 0.5
};

var onEachFeature = function(feature, layer) {
    (function(layer, feature) {
      var that = this;
      layer.on("click", function (e) {
          if (feature.properties.external_id === selected) {
            jsonLayer.resetStyle(layer);
            $('#resultinfo').html("");
            return false;
          }
          jsonLayer.setStyle(defaultStyle);
          layer.setStyle(highlightStyle);
          console.log(feature.properties);

          selected = feature.properties.external_id;

          console.log(feature.properties);

        var smallerName = 'Hello Group SMALL! Your ID is smaller than 60';
        var biggerName = 'Hello Group BIG! Your ID is greater than 60';

          $('#groupID').text('Group name: '+feature.properties.slug);
          if(parseInt(feature.properties.name)>60)
          {
            $('#story').text(biggerName);
          }
          else
          {
            $('#story').text(smallerName);
          }

        $(".popup").show();


        




          return false;
      });
    })(layer, feature);
};

var reloadLayer = function () {
    
    var url = "//s3-us-west-2.amazonaws.com/boundaries.latimes.com/archive/1.0/boundary-set/lafd-first-in-districts.geojson";
    
    $("#loader").show();
    $.ajax({
        type: "GET",
        url: url,
        dataType: 'json',
        success: function (response) {
            var geojson = response;
            if (jsonLayer) { map.removeLayer(jsonLayer); }
            jsonLayer = new L.geoJson(geojson, {
                style: defaultStyle,
                onEachFeature: onEachFeature
            }).addTo(map);
            $("#loader").hide();
            
        }
    });
}

reloadLayer();
