<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

    <a href="#" class="btn btn-lg btn-success" 
   data-toggle="modal" 
   data-target="#basicModal">Click to open Modal</a>


    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&amp;times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>

                <ul class="nav nav-tabs" id="tabContent">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#access-security" data-toggle="tab">Access / Security</a></li>
                    <li><a href="#networking" data-toggle="tab">Networking</a></li>
                </ul>
          
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        Details tab
                        <div class="control-group">
                            <label class="control-label">Instance Name</label>
                        </div>
                    </div>
                    <div class="tab-pane" id="access-security">
                        content 0
                    </div> 
                    <div class="tab-pane" id="networking">
                        <div class="modal-body">
                            <h3>Modal Body</h3>
                            <div style="width: 500px; height: 400px" id="map"></div>
                        </div>
                   </div> 
                </div>


                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
      </div>
    </div>

    <script src="http://code.jquery.com/jquery-2.2.4.js"
              integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
              crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_m4ilxD-gh685xBy0970wNt-SPJe76Wc&libraries=places,geometry,drawing" async defer></script>
    <script>
        var map;
        function initialize() {
          var mapOptions = {
            center: new google.maps.LatLng(51.219987, 4.396237),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("map"),
            mapOptions);
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(51.219987, 4.396237)
          });
          marker.setMap(map);
        }

        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
          });
        }
        $('#basicModal').on('show.bs.modal', function (event) {
            //console.log("jajaja");
            //initMap();
            //initialize();
            //google.maps.event.trigger(map, "resize");
        });
        $('#basicModal').on('shown.bs.modal', function (event) {
            //console.log("jajaja");
            $('#tabContent a:last').tab('show') 
            //initMap();
            initialize();
            //google.maps.event.trigger(map, "resize");
        });
        $('#basicModal').on('hide.bs.modal', function (event) {
            console.log("jajajajajajajaj");
        });


    </script>

</body>
</html>