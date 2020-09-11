

@extends('layouts.app')

@section('content')
　　　
        
     
        
            
    @if (Auth::check())
    
            <div class="row ">
                    <div class="col-sm-4">
                        @include('users.card')
                        
                        <div  class="col-sm-8 m-t-1 ">
                        @include('microposts.microposts')
                        @include('microposts.form')
                        </div>

                        {!! link_to_route('users.favorite','マイページ',['id'=>$user->id],['class'=>'btn btn-success col-sm-4'])  !!}
                       
                    </div>
                    
            </div>
           
            
            
           
        </div>

        
        
        
    @else
        <div class="text-center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}
            </div>
        </div>
    @endif
    
@endsection