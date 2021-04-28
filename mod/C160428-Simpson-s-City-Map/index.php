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
    $url_image = "https://www.cityplanner.biz/wp-content/uploads/2016/04/20160425_Selezione_006.png";
  }
  ?>

  <title><?php echo $meta_title; ?></title>

  <link rel=canonical href="https://www.cityplanner.biz/webapp/springfieldmap/index.php<?php echo $url_can; ?>"/>
  <meta name="description" content="<?php echo $meta_desc; ?>"/>
  <meta property=og:locale content=it_IT />
  <meta property=og:type content=article />
  <meta property=og:url content="https://www.cityplanner.biz/webapp/springfieldmap/index.php<?php echo $url_can; ?>"/>
  <meta property=og:site_name content=CityPlanner />
  <meta property=og:title content="<?php echo $meta_title; ?>"/>
  <meta property=og:description content="<?php echo $meta_desc; ?>"/>

  <meta property=og:updated_time content="2021-04-28T12:13:57+00:00"/>

  <meta property=og:image content="<?php echo $url_image; ?>"/>
  <meta property=og:image:width content=1419 />
  <meta property=og:image:height content=947 />

  <meta property=article:section content=blog />
  <meta property=article:published_time content="2016-04-25T09:31:07+00:00"/>
  <meta property=article:modified_time content="2021-04-28T12:13:57+00:00"/>

  <meta name=twitter:card content=summary />
  <meta name=twitter:description content="<?php echo $meta_desc; ?>"/>
  <meta name=twitter:title content="<?php echo $meta_title; ?>"/>
  <meta name=twitter:image content="<?php echo $url_image; ?>"/>
  <meta name=twitter:creator content="@pj_go_2020"/>

  <link rel="stylesheet" type="text/css" href="https://www.cityplanner.biz/experiment_host/qgis2leaf/main_map/css/own_style_full.css">

  <!-- css BOOTSTRAP -->
  <link rel="stylesheet" href="https://www.cityplanner.biz/source/bootstrap/3.3.7/bootstrap.min.css">


  <!-- css MATERIAL BOOTSTRAP -->
  <link rel="stylesheet" href="https://www.cityplanner.biz/source/bootstrap/bootstrap-material-design/0.3.0/material-fullpalette.css">
  <link rel="stylesheet" href="https://www.cityplanner.biz/source/bootstrap/bootstrap-material-design/0.3.0/ripples.css">
  <link rel="stylesheet" href="https://www.cityplanner.biz/source/bootstrap/bootstrap-material-design/0.3.0/roboto.css">

  <!-- css FAW -->
  <link rel='stylesheet' id='fontawesome-css'  href='https://www.cityplanner.biz/source/font-awesome/font-awesome4.7.0.css' type='text/css' media='all' />

  <!-- css LEAFLET -->
  <link rel="stylesheet" href="https://www.cityplanner.biz/source/leaflet/0.7.7/leaflet.css" />

  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

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

  <link rel="stylesheet" href="style.css" />

</head>
<body style="padding-top: 0px;">
  
  <a href="https://github.com/piergiorgio-roveda/qgis2web-modder/tree/main/mod/C160428-Simpson-s-City-Map">
    <img loading="lazy" width="149" height="149" 
      src="https://github.blog/wp-content/uploads/2008/12/forkme_right_red_aa0000.png?resize=149%2C149" 
      class="attachment-full size-full" alt="Fork me on GitHub" data-recalc-dims="1" 
      style="position: fixed;top: 0px;z-index: 500;right: 0px;" />
  </a>

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
          <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm button-control" onclick="onClick_zoomIn()">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </button>
        </li>
        <li class="active">
          <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm button-control" onclick="onClick_home()">
            <i class="fa fa-home" aria-hidden="true"></i>
            </button>
        </li>
        <li class="active">
          <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm button-control" onclick="onClick_zoomOut()">
            <i class="fa fa-minus-circle" aria-hidden="true"></i>
            </button>
        </li>
        <li class="active">
          <button type="button" style="font-size: 25px;" class="btn btn-primary btn-sm button-control" onclick="zoomTo(45.474740990797713,9.171852132330946)"><img src="noun_85835_cc.svg" alt="Doughnut by Jake Dunham from the Noun Project" style="width:25px;"></button>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div id="simpson-cointainer" 
      class="hidden-xs col-sm-2 col-sm-offset-10">
        <img src="spring_mod.png" style="width:100%;" alt="https://www.2hbn.com/wp-content/uploads/2012/04/spring.jpg">
    </div>
  </div>

  <!-- javascript -->
  <!-- jQuery Core & UI-->
  <script src="https://www.cityplanner.biz/source/jquery/2.2.4/jquery-2.2.4.js"></script>
  <!--script src="https://code.jquery.com/jquery-1.11.3.js"></script>-->
  
  <script src="https://www.cityplanner.biz/source/bootstrap/3.3.7/bootstrap.min.js"></script>
  <script src="https://www.cityplanner.biz/source/leaflet/0.7.7/leaflet.js"></script>
  
  <script>

    var dMap = new Array();
    
    <?php
    if($_GET['place']){
      ?>
      dMap.is_place = 1;
      <?php
    }
    else{
      ?>
      dMap.is_place = 0;
      <?php
    }
    ?>
  </script>

  <script src="app.js"></script>

</body>
</html>
