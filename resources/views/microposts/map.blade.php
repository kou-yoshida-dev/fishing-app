

@extends('layouts.app')

        

@section('content')

    <h2 class="col-12 pt-5 mb-5" id="z" style="text-align:center;">{{$map}}</h2>




    <div  style="width:100%;">
        <div id="my_map" style="height:700px;width:100% ; margin:0 auto;"></div>
    </div>

    





    
    
    @endsection
    
    @section('javascript')
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFhznShSE-YwtM7GX98uE3YQMDFUrwy48&callback=initMapWithAddress" async defer></script><!-- マップよう -->

    @endsection
        
        