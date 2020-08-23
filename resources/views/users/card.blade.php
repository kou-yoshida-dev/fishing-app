<div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <span>{{ $user->microposts_count }}件</span>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
                
                @include('commons.user_follow')
            </div>
            