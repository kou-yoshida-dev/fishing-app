<ul class="nav   nav-tabs  nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item" style="width:20%;">
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }} ">
                        timeline
                        <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
                    </a>

                 </li>   
                 {{-- フォロー一覧タブ --}}
                    <li class="nav-item">
                            <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                                follow
                                <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                            </a>
                    </li>
                
                    {{-- フォロワー一覧タブ --}}
                    <li class="nav-item ">
                        <a href="{{ route('users.followers',['id'=>$user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }} ">follower <span class="badge badge-secondary">{{ $user->followers_count }}</span>
                        </a>
                    </li>
                
                    {{-- お気に入り --}}
                <li class="nav-item" style="width:20%;"><a href="{{ route('users.favorite',['id'=>$user->id]) }}" class="nav-link {{ Request::routeIs('users.favorite') ? 'active' : '' }} ">favorite
                <span class="badge badge-secondary">{{ $user->favorite_count }}</span></a></li>
            </ul>