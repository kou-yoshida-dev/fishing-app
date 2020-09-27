<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Microposts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>




       
       
    </head>

    <body>
    
    
     

        {{-- ナビゲーションバー --}}

       
        @include('commons.navbar')
        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>

     

        @yield('javascript');
<script>
// MAPページ用
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





<!-- 投稿用 -->
<script>
function initMap() {
  var target = document.getElementById('gmap');  
  //マップを生成
  var map = new google.maps.Map(target, {  
    center: {lat: 36, lng: 139},
    zoom: 8
  });
  //ジオコーディングのインスタンスの生成
  var geocoder = new google.maps.Geocoder();  
  
  //マップにリスナーを設定
  map.addListener('click', function(e){
    //リバースジオコーディングでは location を指定
    geocoder.geocode({location: e.latLng}, function(results, status){
      if(status === 'OK' && results[0]) {

        console.log(results[0].formatted_address);
        var result = results[0].formatted_address;
        document.getElementById('result').value=result;
       

        //マーカーの生成
        var marker = new google.maps.Marker({
          position: e.latLng,
          map: map,
          title: results[0].formatted_address,
          animation: google.maps.Animation.DROP
        });
        
        //情報ウィンドウの生成
        var infoWindow = new google.maps.InfoWindow({
          content:  results[0].formatted_address,
          pixelOffset: new google.maps.Size(0, 5)
        });
 
        //マーカーにリスナーを設定
        marker.addListener('click', function(){
          infoWindow.open(map, marker);
        });
        
        //情報ウィンドウリスナーを設定
        infoWindow.addListener('closeclick', function(){
          marker.setMap(null);  //マーカーを削除
        });
      }else if(status === 'ZERO_RESULTS') {
        alert('不明なアドレスです： ' + status);
        return;
      }else{
        alert('失敗しました： ' + status);
        return;
      }
    });
  });
} 
</script> 








  
  
 




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

</body>
</html>