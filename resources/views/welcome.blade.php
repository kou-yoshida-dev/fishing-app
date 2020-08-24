

@extends('layouts.app')

@section('content')
　　　{!! link_to_route('users.favorite','お気に入り一覧',['id'=>$user->id],['class'=>'btn btn-success'])  !!}
    @if (Auth::check())
        
     
        <div class="row">
            <div class="col-4-sm">
                @include('microposts.microposts')
                @include('microposts.form')
            </div>
            <div class="col-8-sm ml-6">
                 
            
               @include('users.card')
           </div>
            
            
            
        </div>
        
        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}
            </div>
        </div>
    @endif
    
@endsection