@if(count($microposts)>0)

<ul class="list-unstyled">
    @foreach($microposts as $micropost)
    <li class="medi mb-3 timeline">
        <div class="media-bo">
                    <div class="post mb-2">
                        <img class="mr-3" src="{{Gravatar::get($micropost->user->email,['size'=>50])}}">
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        <span class="text-muted"> {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <div class="post mb-2" >
                            <h3 class="badge badge-primary mr-2" style="margin:0 !important;;">ジャンル</h3>
                            <p class="mb-0" >{!! $micropost->ganle !!}</p>
                        </div>    
                        <div class="post mb-2">
                            <h3 class="badge badge-primary">コメント</h3>
                            <p class="mb-0">{!! $micropost->content !!}</p>
                        </div>    
                            
                    </div>

                    <div style="display:flex; justify-content:center;">
                        <div style="margin-right:10px;">
                            
                                        @if(Auth::user()->is_favoring($micropost->id))
                                        {!! Form::open(['route'=>['micropost.unfav',$micropost->id],'method'=>'delete'])!!}
                                        {!! Form::submit('お気に入り解除',['class'=>'btn btn-sm btn-danger'])  !!}
                                        {!! Form::close()!!}
                                        @else
                                        {!! Form::open(['route'=>['micropost.fav',$micropost->id],'method'=>'post'])!!}
                                        {!! Form::submit('お気に入り',['class'=>'btn btn-sm btn-success'])  !!}
                                        {!! Form::close()!!}
                                        @endif
                           
                        </div>





                        @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('投稿削除', ['class' => 'btn btn-danger btn-sm']) !!}
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