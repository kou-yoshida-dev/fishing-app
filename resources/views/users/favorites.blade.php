
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="card">
               <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <span>{{ $user->favorite_count }}件</span>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
                
                @include('commons.user_follow')
            </div>
            
        
    </div>
    
    <div class="col-sm-8">
            <ul class="nav   nav-tabs  nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        TimeLine
                        <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
                    </a>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item"><a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            Followings
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a></li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item"><a href="{{ route('users.followers',['id'=>$user->id]) }}" class="nav-link">Followers <span class="badge badge-secondary">{{ $user->followers_count }}</span></a></li>
               
                
                
                {{-- お気に入り --}}
                <li class="nav-item"><a href="{{ route('users.favorite',['id'=>$user->id]) }}" class="nav-link">Favorites
                <span class="badge badge-secondary">{{ $user->favorite_count }}</span></a></li>
            </ul>
            
            
             @include('microposts.microposts')
           
           
    </div>
    

    
    
    
</div>
@endsection