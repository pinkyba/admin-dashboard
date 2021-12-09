<!DOCTYPE html>
<html>
  <head>
    <title>Custom Legend</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }

      #legend h3 {
        margin-top: 0;
      }

      #legend img {
        vertical-align: middle;
      }

    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="legend"><h3>Legend</h3></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_s_PG9Kun4pFYDV24ik9H1p-_GrGxVMQ&callback=initMap&v=weekly"
      async
    ></script>
    <script type="text/javascript">
      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: new google.maps.LatLng(-33.91722, 151.23064),
          mapTypeId: "roadmap",
        });

        const iconBase = "https://maps.google.com/mapfiles/kml/shapes/";
        const icons = {
          parking: {
            name: "Parking",
            icon: iconBase + "parking_lot_maps.png",
          },
          library: {
            name: "Library",
            icon: iconBase + "library_maps.png",
          },
          info: {
            name: "Info",
            icon: iconBase + "info-i_maps.png",
          },
        };
        const features = [
          {
            position: new google.maps.LatLng(-33.91721, 151.2263),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91539, 151.2282),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91747, 151.22912),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.9191, 151.22907),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91725, 151.23011),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91872, 151.23089),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91784, 151.23094),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91682, 151.23149),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.9179, 151.23463),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91666, 151.23468),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.916988, 151.23364),
            type: "info",
          },
          {
            position: new google.maps.LatLng(-33.91662347903106, 151.22879464019775),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.916365282092855, 151.22937399734496),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.91665018901448, 151.2282474695587),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.919543720969806, 151.23112279762267),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.91608037421864, 151.23288232673644),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.91851096391805, 151.2344058214569),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.91818154739766, 151.2346203981781),
            type: "parking",
          },
          {
            position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
            type: "library",
          },
        ];

        features.forEach((feature) => {
          new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map,
          });
        });

        const legend = document.getElementById("legend");

        for (const key in icons) {
          const type = icons[key];
          const name = type.name;
          const icon = type.icon;
          const div = document.createElement("div");

          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }

        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
      }

    </script>
  </body>
</html>