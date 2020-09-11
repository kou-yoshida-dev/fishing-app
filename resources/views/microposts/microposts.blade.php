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

                    <div style="display:flex;">
                        <div style="margin-right:10px;">
                            
                                        @if(Auth::user()->is_favoring($micropost->id))
                                        {!! Form::open(['route'=>['micropost.unfav',$micropost->id],'method'=>'delete'])!!}
                                        {!! Form::submit('お気に入り解除',['class'=>'btn btn-success'])  !!}
                                        {!! Form::close()!!}
                                        @else
                                        {!! Form::open(['route'=>['micropost.fav',$micropost->id],'method'=>'post'])!!}
                                        {!! Form::submit('お気に入り',['class'=>'btn btn-light'])  !!}
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
                    
                    
                    
                    
        </div>
        
        
    </li>
    @endforeach
    
</ul>
{{$microposts->links()}}
@else
  <h1>投稿はありません</h1>

@endif