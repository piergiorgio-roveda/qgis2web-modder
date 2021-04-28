<!DOCTYPE html>
<html lang="it-IT" prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb#">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="https://www.cityplanner.biz/webapp/springfieldmap/noun_85835_cc.png">

  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="https://www.cityplanner.biz/xmlrpc.php">

<!--[if lt IE 9]>
<script src="https://www.cityplanner.biz/wp-content/themes/flat-theme/assets/js/html5shiv.js"></script>
<script src="https://www.cityplanner.biz/wp-content/themes/flat-theme/assets/js/respond.min.js"></script>
<![endif]-->
<?php
if($_GET['place']){
  $place=$_GET['place'];
  if($place=="Fresh Squeezed Lemonade"){
    echo "<!-- FOUND -->";
  }
  else{
    echo "<!-- NOT FOUND -->";
  }

  $meta_place = json_decode(file_get_contents("https://www.cityplanner.biz/webapp/springfieldmap/pt_simpson.geojson", true));
  //print_r($meta_place);
  $i=0;
  foreach($meta_place->features as $mydata){
    if($place == $mydata->properties->name){
      $meta_title = "Simpson's City MAP: ".$mydata->properties->name;
      $meta_desc = substr($mydata->properties->descr,0,80);
      $i++;
      $url_can = "?place=".urlencode($place);;
      $url_image = $mydata->properties->image;
    }
  }
}
else{
  $meta_title = "Simpson's City MAP >> CityPlanner";
  $meta_desc = "Yet another #springfield awesome #map - from #Simpson playground - power by #LeafletJS";
  $url_can = "";
  $url_image = "https://lh6.googleusercontent.com/-7fPjnttpHO8/Vx5Z1qBtIGI/AAAAAAAADCA/e4n5o-w5E5Uv3IhzCgTPEjmISYrL_TXYACL0B/w1286-h858-no/20160425_Selezione_006.png";
}

?>

<title><?php echo $meta_title; ?></title>

<link rel=canonical href="https://www.cityplanner.biz/webapp/springfieldmap/index.php<?php echo $url_can; ?>"/>
<meta name="description" content="<?php echo $meta_desc; ?>"/>
<link rel="publisher" href="https://plus.google.com/+PJHooker/about"/>
<meta property=og:locale content=it_IT />
<meta property=og:type content=article />
<meta property=og:url content="https://www.cityplanner.biz/webapp/springfieldmap/index.php<?php echo $url_can; ?>"/>
<meta property=og:site_name content=CityPlanner />
<meta property=og:title content="<?php echo $meta_title; ?>"/>
<meta property=og:description content="<?php echo $meta_desc; ?>"/>

<meta property=og:updated_time content="2016-04-25T12:13:57+00:00"/>

<meta property=og:image content="<?php echo $url_image; ?>"/>
<meta property=og:image:width content=1419 />
<meta property=og:image:height content=947 />

<meta property=article:section content=blog />
<meta property=article:published_time content="2016-04-25T09:31:07+00:00"/>
<meta property=article:modified_time content="2016-04-29T12:13:57+00:00"/>

<meta name=twitter:card content=summary />
<meta name=twitter:description content="<?php echo $meta_desc; ?>"/>
<meta name=twitter:title content="<?php echo $meta_title; ?>"/>
<meta name=twitter:image content="<?php echo $url_image; ?>"/>
<meta name=twitter:creator content="@pj_go_2020"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
<link rel="stylesheet" type="text/css" href="https://www.cityplanner.biz/experiment_host/qgis2leaf/main_map/css/own_style_full.css">

<!-- css BOOTSTRAP -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">



<!-- css MATERIAL BOOTSTRAP -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/fonts/Material-Design-Icons.svg">
<link rel="stylesheet" href="https://getbootstrap.com/examples/dashboard/dashboard.css">

<!-- css FAW -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
<!-- javascript -->
<!-- jQuery Core & UI-->
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.js"></script>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "https://www.cityplanner.biz/map/",
      "name": "CityMapper"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "https://www.cityplanner.biz/map/maps-new/",
      "name": "Maps"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "https://www.cityplanner.biz/map/category/leaflet/",
      "name": "GIS LeafletJS"
    }
  }]
}
</script>

<style>


#forth-cointainer {
  bottom: 60px;
  position: absolute;
  padding-right: 0px;
}

#simpson-cointainer {
  top: 0px;
  position: absolute;
}


.navbar-fixed-side {
position: fixed;
}

.navbar-fixed-side .navbar-nav > li {
float: none;
}

.navbar.navbar, .navbar-default.navbar {
background-color: rgba(255, 255, 255, 0);
color: rgba(255, 255, 255, 0.84);
}

.btn-primary:not(.btn-link):not(.btn-flat) {
    background-color: #FBCF08;
    color: #000;
}

#buttonList{
  bottom:20px;
  position:absolute;
}


#map{
	position: absolute;
}


</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155105815-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155105815-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NFQVJCD');</script>
<!-- End Google Tag Manager -->

</head>
<body style="padding-top: 0px;">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NFQVJCD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <div id="map" style="background-color: #1F2024;"></div>

    <div class="row">
			<div id="forth-cointainer" class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 forth">

      </div>
		</div>


    <!-- Fixed navbar LEFT -->
    <div class="navbar navbar-default navbar-fixed-side navbar-fixed-side-left" style="width:10px;" role="navigation">
    <div class="navbar-collapse">
    <ul class="nav navbar-nav">
    <li class="active">
      <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm mdi-content-add-circle-outline button-control" onclick="onClick_zoomIn()"></button>
    </li>
    <li class="active">
      <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm mdi-action-home button-control" onclick="onClick_home()"></button>
    </li>
    <li class="active">
      <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm mdi-content-remove-circle-outline button-control" onclick="onClick_zoomOut()"></button>
    </li>
    <li class="active">
      <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm button-control" onclick="zoomTo(45.474740990797713,9.171852132330946)"><img src="noun_85835_cc.svg" alt="Doughnut by Jake Dunham from the Noun Project" style="width:25px;"></button>
    </li>
    <!--<li class="active">
      <a style="font-size: 25px;" class="btn btn-primary btn-sm mdi-action-subject button-control" href="https://www.cityplanner.biz/simpsons-city-map/"></a>
    </li>
    <li class="active">
      <a style="font-size: 25px;" class="btn btn-primary btn-sm mdi-action-list button-control" href="https://www.cityplanner.biz/custommap/simpsons-city-place-list/"></a>
    </li>-->
    </ul>
    </div>
    </div>

    <div class="row">
			<div id="simpson-cointainer" class="hidden-xs col-sm-2 col-sm-offset-10"><img src="spring_mod.png" style="width:100%;" alt="https://www.2hbn.com/wp-content/uploads/2012/04/spring.jpg">
      </div>
		</div>

    <script>



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
          console.log('LuoghiSpringfield');

					$('#forth-cointainer').html( ''
						+'<div class="alert alert-dismissible alert-info" style="z-index:1000;">'
						+'<button type="button" class="close mdi-action-highlight-remove" style="right:-27px;color:red;opacity: .7;" data-dismiss="alert"></button>'
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
						console.log(e.target.feature);
					view_abbandonato(e.target.feature.geometry.coordinates[1],e.target.feature.geometry.coordinates[0]);
				}


				function view_abbandonato(lat,lng){

					//showMap();
					//console.log(e);
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
                  //+"<div class='col-md-4' style='padding: 0px 25px;'>"
                  //  +"<a class='yt-promo' href='https://www.youtube.com/channel/UCEkiQYFsotUmbPTufps3TdA?sub_confirmation=1' target='_blank'>"
                  //    +"<img src='https://www.cityplanner.biz/webapp/springfieldmap/youtube_simpson.jpg' style='width:100%;' />"
                  //  +"</a>"
                  //+"</div>"
                  +"<div class='col-md-4'></div>"
                  +"</div>"
                  +"<div class='row' style='width:100%;'>"
                  +"<div class='col-md-4'></div>"
                  +"<div class='col-md-4' style='text-align:center;' id='mainbutton'>"
                  +"<button type='button' onclick='showList()' class='btn btn-lg btn-primary'>Apri lista</button>"
                  //+"<a href='https://umap.openstreetmap.fr/it/map/simpsons-city-map-citymapper_82632' class='btn btn-lg btn-primary'>Contribuisci</a>"
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
              + ""
              ).appendTo("body");
              $('.yt-promo').on('click',function(){
                //window.open("https://www.youtube.com/channel/UCEkiQYFsotUmbPTufps3TdA?sub_confirmation=1", "_blank");

              });              
              <?php
              if($_GET['place']){
              ?>
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
                      +'<button type="button" class="close mdi-action-highlight-remove" style="right:-27px;color:red;opacity: .7;" data-dismiss="alert"></button>'
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

              <?php
              }
              ?>
          });



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
                body_modal += "<tr><td>"+properties.name+ "</td><td><i class='mdi-action-room'></i><a  data-dismiss='modal' onclick='zoomTo("+lat+","+lng+")'>show</a></td></tr>";
                /*
                arr=[];
          			arr.push(properties.name);
          			arr.push("<i class='mdi-action-room'></i><a href='"+properties.url_post+"'>ID sito: "+properties.postid+"</a> - <a onclick='view_abbandonato("+lat+","+lng+")'>show</a>");
          			dataSet.push(arr);
                */

              }); // EACH -end

              body_modal += '</table>';

              $('.modal-body').html(body_modal);
          	});



            }

    </script>





</body>
</html>
