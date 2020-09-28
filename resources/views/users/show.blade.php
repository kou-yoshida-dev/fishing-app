@extends('layouts.app')

@section('content')
<div class=" pt-5 row" style=" margin:0;">

    <div class="card " style="margin:80px auto; margin-top:0;">
    
                @include('users.card')

    <div class="col-12 col-md-8  mb-5" style=" margin:0 auto;">
        

        @if (Auth::id() == $user->id)
        {{-- 投稿 --}}
        @include('microposts.form')

        @endif
    </div>
</div>

<div class="">

        <div class="col-12 col-sm-12" style="padding:0; margin:0 auto;">
            {{-- タブ --}}
            @include('commons.tab')
            {{-- ユーザ一覧 --}}
            @include('microposts.microposts')
        </div>

</div>


@endsection




<!-- MAP読み込み -->
@section('javascript')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFhznShSE-YwtM7GX98uE3YQMDFUrwy48&callback=initMap" async defer></script><!-- YOUR_API_KEYの部分は取得した APIキーで置き換えます　投稿 -->
@endsection