@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
       
        <div class="col-sm-8">
            {{-- タブ --}}
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
                <li class="nav-item"><a href="{{ route('users.followers',['id'=>$user->id]) }}" class="nav-link">Followers <span class="badge badge-secondary">{{ $user->followings_count }}</span></a></li>
               
                
                
                {{-- お気に入り --}}
                <li class="nav-item"><a href="{{ route('users.favorite',['id'=>$user->id]) }}" class="nav-link">Favorites
                <span class="badge badge-secondary">{{ $user->favorite_count }}</span></a></li>
            </ul>
           
            {{-- ユーザ一覧 --}}
            @include('users.users')
        </div>
    </div>
@endsection