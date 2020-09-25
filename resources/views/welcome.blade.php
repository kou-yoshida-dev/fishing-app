

@extends('layouts.app')

        

@section('content')
@if (Auth::check())




<div class="row ">

    

    <div class="col-12 col-md-8  mb-2 mt-4" style="margin:0 auto;">
        

        @if (Auth::id() == $user->id)
        {{-- 投稿フォーム --}}
        @include('microposts.form')

        @endif

        <div  style="text-align:right;">
            {!! link_to_route('users.favorite','詳細ページへ',['id'=>$user->id],['class'=>'btn btn-success  col-5 mb-5 col-sm-3 mb-md-3 mt-4  '])  !!} 
        </div>
        <div  style="text-align:right;">
            {!! link_to_route('microposts.search','検索',[],['class'=>'btn btn-success  col-5 mb-5 col-sm-3 mb-md-3 mt-4  '])  !!} 
        </div>
    </div>


</div>
 
    

<div class="row mt-5">
    <h1 style="margin:0 auto;" >新着投稿</h1>
</div>


<div class="row">
    

    <div class="col-md-11 mt-5" style="margin:0 auto;">

        @include('microposts.microposts')

    </div>

</div>            
    
    




        

        
    @else

        <div class="login mb-4">
            <div class="text-center" >
                <div class="top">
                    <h1>Fishing tweet</h1>
                    <p>釣りスポット共有アプリ</p>
                </div>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary col-6 mb-3 mt-5']) !!}
                
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary col-6']) !!}
            </div>
            
        </div>
    @endif
@endsection
        
        