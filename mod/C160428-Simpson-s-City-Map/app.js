
var southWest = L.latLng(45.440605, 9.117321),   //Questa variabile
  northEast = L.latLng(45.492313, 9.246679), //definisce i margini
  bounds = L.latLngBounds(southWest, northEast);     //geografici della mappa

var map = L.map('map', {
  center: [45.464907, 9.186236],
  zoomControl: false,
  maxBounds: bounds,               //questa variabile blocca la mappa sui margini definiti prima
  maxZoom:16,
  minZoom:14
});
map.fitBounds(bounds);

var basemap_0 = L.tileLayer('./{z}/{x}/{y}.png', {
  tms: true,
  maxZoom: 18,
  zIndex:1000,
  attribution: ''
    + 'Imagery © <a href="https://www.smaxity.net/images/SpringfieldMap.jpg">smaxity.net/</a>'
    + '<br>Map data <a href="https://simpsons.playgis.com/">simpsons.playgis</a>'
    + '<br>More info at: <a href="https://www.cityplanner.biz/simpsons-city-map/">CityPlanner Simpsons City Map</a>'
});
basemap_0.addTo(map);

var markers_t = {};

// POST
cluster = 0;
function_icon4 = 'IconPost';
name4 = 'l1_4';

markers_t[name4] = new L.featureGroup();

// Post
$.getJSON('pt_simpson.geojson', function(data) {

  var def_icon = new Array();
  def_icon["temp"] = eval(function_icon4);
  var geojson4 = L.geoJson(data,{pointToLayer: def_icon["temp"] });
  markers_t[name4].addLayer(geojson4);
  markers_t[name4].addTo(map);

});

function IconPost(feature,latlng) {
  return L.marker(latlng,{
    icon: L.icon({
      iconUrl: getIcon_ZombieHW(feature.properties.type), //'https://www.cityplanner.biz/supply/icon_web/mapbox-maki-51d4f10/renders/star-24@2x.png',
      iconSize: [40,40]
    }),
    //clickable:false
  }).on('click', onClick_LuoghiSpringfield);
}

function getIcon_ZombieHW(d) {
  return  "https://www.cityplanner.biz/supply/icon_web/mapbox-maki-51d4f10/renders/"+d+"-24@2x.png";
}


function onClick_LuoghiSpringfield(e) {

  $('#forth-cointainer').html( ''
    +'<div class="alert alert-dismissible alert-info" style="z-index:1000;">'
    +'<button type="button" class="close" style="right:-27px;color:red;opacity: .7;" data-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i></button>'
    +'<div class="well well-sm">'
      +'<h2>'+e.target.feature.properties.name+'</h2>'
          +'Descrizione: '+e.target.feature.properties.descr+''
          +'<div style="text-align:center;margin-top:15px;"><p><a class="label label-info" href="'+e.target.feature.properties.url+'" target="_blank">Approfondimento</a></p></div>'
    +'</div>'
    +'<div class="row">'
      +'<div class="col-md-9" style="text-align:center;">'
              +'<img src="'+e.target.feature.properties.image+'" style="width:300px;"  />'
      +'</div>'
      +'<div class="col-md-3" style="text-align:center;">'
              +'<img src="'+getIcon_ZombieHW(e.target.feature.properties.type)+'" /><br>'
              +'<span class="label label-warning">'+e.target.feature.properties.type+'</span>'
      +'</div>'
    +'</div>'
    +'<button type="button" class="btn btn-primary btn-sm button-control" data-dismiss="alert">CLOSE</button>'
    +'</div>'
  +'');

  view_abbandonato(e.target.feature.geometry.coordinates[1],e.target.feature.geometry.coordinates[0]);

}


function view_abbandonato(lat,lng){

  zoomTo(lat,lng);

  temp_geom = new L.featureGroup();
  var circle_temp = L.circle([lat, lng], 50, {
    color: 'red',
    weight: 1,
    fillColor: '#f03',
    fillOpacity: 0.1
  });
  temp_geom.addLayer(circle_temp);
  map.addLayer(temp_geom);

}

function zoomTo(lat,lng) {
  map.setView([lat,lng], 17);
}

function onClick_zoomIn () {
  map.zoomIn();
}
function onClick_zoomOut () {
  map.zoomOut();
}
function onClick_home () {
  map.setView([45.464907, 9.186236], 14);
}

$(document).ready(function() {

  $(""
    +"<div id='buttonList' style='width:100%;'>"
      +"<div class='row' style='width:100%;'>"
      +"<div class='col-md-4'></div>"
      +"<div class='col-md-4'></div>"
      +"</div>"
      +"<div class='row' style='width:100%;'>"
      +"<div class='col-md-4'></div>"
      +"<div class='col-md-4' style='text-align:center;' id='mainbutton'>"
      +"<button type='button' onclick='showList()' class='btn btn-lg btn-primary'>Apri lista</button>"
      +"</div>"
      +"<div class='col-md-4'></div>"
      +"</div>"
      +"<div class='modal fade' id='myModal' tabindex='-1' role='dialog'>"
      +"  <div class='modal-dialog modal-lg' role='document' style='z-index: 2000;'>"
      +"    <div class='modal-content'>"
      +"      <div class='modal-header'>"
      +"        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>"
      +"      </div>"
      +"      <div class='modal-body' style='overflow-y: scroll;height:400px;'>"
      +"        "
      +"      </div>"
      +"      <div class='modal-footer' style='text-align:center;'>"
      +"        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>"
      +"      </div>"
      +"    </div>"
      +"  </div>"
      +"</div>"
    +"</div>"
    + "").appendTo("body");
        
    if(dMap.is_place==true){

      var dimenticatiAPI = "https://www.cityplanner.biz/webapp/springfieldmap/pt_simpson.geojson";

      $.getJSON(dimenticatiAPI, function(data){
        $.each(data.features, function (key, val) {

          geometry = val.geometry;
          lat=geometry.coordinates[1];
          lng=geometry.coordinates[0];
          properties = val.properties;
          if(properties.name==='<?php echo $place; ?>'){

            $('#forth-cointainer').html( ''
              +'<div class="alert alert-dismissible alert-info" style="z-index:1000;">'
              +'<button type="button" class="close" style="right:-27px;color:red;opacity: .7;" data-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i></button>'
              +'<div class="well well-sm">'
                +'<h2>'+properties.name+'</h2>'
                    +'Descrizione: '+properties.descr+''
                    +'<div style="text-align:center;margin-top:15px;"><p><a class="label label-info" href="'+properties.url+'" target="_blank">Approfondimento</a></p></div>'
              +'</div>'
              +'<div class="row">'
                +'<div class="col-md-9" style="text-align:center;">'
                        +'<img src="'+properties.image+'" style="width: auto;max-height: 200px;" />'
                +'</div>'
                +'<div class="col-md-3" style="text-align:center;">'
                        +'<img src="'+getIcon_ZombieHW(properties.type)+'" /><br>'
                        +'<span class="label label-warning">'+properties.type+'</span>'
                +'</div>'
              +'</div>'
              +'</div>'
              +'');
              view_abbandonato(lat,lng);
            }

        }); // EACH -end

      });

    }

}); //doc-ready

function showList(){

  $('#myModal').modal('show');

  dimenticatiAPI ='pt_simpson.geojson';
  $.getJSON(dimenticatiAPI, function(data){

    var dataSet = new Array();
    var arr = new Array();
    var body_modal = '<table class="table table-striped table-hover">';

    var thisCOUNT = 0;

    $.each(data.features, function (key, val) {

      thisCOUNT++;
      geometry = val.geometry;
      lat=geometry.coordinates[1];
      lng=geometry.coordinates[0];
      properties = val.properties;
      body_modal += "<tr><td>"+properties.name+ "</td><td><i class=\"fa fa-eye\" aria-hidden=\"true\"></i><a  data-dismiss='modal' onclick='zoomTo("+lat+","+lng+")'>show</a></td></tr>";

    }); // EACH -end

    body_modal += '</table>';

    $('.modal-body').html(body_modal);
  });

}
      