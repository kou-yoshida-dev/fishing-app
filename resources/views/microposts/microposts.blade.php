@if(count($microposts)>0)

<ul class="list-unstyled">
    @foreach($microposts as $micropost)
    <li class="media mb-3">
        <img class="mr-3" src="{{Gravatar::get($micropost->user->email,['size'=>50])}}">
        <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div>
                        
                        @if(Auth::user()->is_favoring($micropost->id))
                        {!! Form::open(['route'=>['micropost.unfav',$micropost->id],'method'=>'delete'])!!}
                           {!! Form::submit('unfavorite',['class'=>'btn btn-success'])  !!}
                        {!! Form::close()!!}
                        @else
                        {!! Form::open(['route'=>['micropost.fav',$micropost->id],'method'=>'post'])!!}
                           {!! Form::submit('favorite',['class'=>'btn btn-light'])  !!}
                        {!! Form::close()!!}
                        @endif
                        
                        
                        
                    </div>
                    
                    
                    
                    @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                    @endif
        </div>
        
        
    </li>
    @endforeach
    
</ul>
{{$microposts->links()}}
@else
  <h1>nothing favorite microposts</h1>

@endif