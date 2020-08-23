@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="card">
                @include('users.card')
        
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
                <li class="nav-item"><a href="{{ route('users.followers',['id'=>$user->id]) }}" class="nav-link">Followers</a></li>
            </ul>
            
            
             @include('microposts.microposts')
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            @endif
            
           
    </div>
    

    
    
    
</div>
@endsection