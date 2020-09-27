<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Microposts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">



        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFhznShSE-YwtM7GX98uE3YQMDFUrwy48" async defer></script>
       
       
    </head>

    <body>
     

        {{-- ナビゲーションバー --}}

       
        @include('commons.navbar')
        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
      

       


        
        <script>













        var nowposition =document.getElementById('z').innerHTML;
   
       console.log(nowposition);
      
        var _my_address = nowposition;
        function initMapWithAddress() {
            var opts = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            var my_google_map = new google.maps.Map(document.getElementById('my_map'), opts);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode(
              {
                'address': _my_address,
                'region': 'jp'
              },
              function(result, status){
                if(status==google.maps.GeocoderStatus.OK){
                    var latlng = result[0].geometry.location;
                    my_google_map.setCenter(latlng);
                    var marker = new google.maps.Marker({position:latlng, map:my_google_map, title:latlng.toString(), draggable:true});
                    google.maps.event.addListener(marker, 'dragend', function(event){
                        marker.setTitle(event.latLng.toString());
                    });
        
                }
              }
            );
          }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
    </body>
</html>