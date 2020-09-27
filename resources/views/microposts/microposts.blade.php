@if(count($microposts)>0)

<ul class="list-unstyled">
    @foreach($microposts as $micropost)
    <li class="medi mb-sm-3 timeline col-12 col-sm-8 col-md-6">
        <div class="media-bo">
                    <div class="post mb-2">
                        <img class="mr-3" src="{{Gravatar::get($micropost->user->email,['size'=>50])}}">
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        <span class="text-muted"> {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <div class="post mb-3" style="text-align:center;">
                            <h3 class="badge badge-primary  col-6 col-sm-3 col-md-4" style="margin:0 !important;;">地域区分</h3>
                            <p class="mt-2 mb-0 col-10" >{!! $micropost->region !!}</p>
                        </div>    

                        <div class="post mb-3" style="text-align:center;" >
                            <h3 class="badge badge-primary mr-2 col-6 col-sm-3 col-md-4 " style="margin:0 !important;;">ジャンル</h3>
                            <p class="mt-2 mb-0 col-10 " >{!! $micropost->ganle !!}</p>
                        </div>    

                        <div class="post mb-3 " style="text-align:center;">
                            <h3 class="badge badge-primary col-6 col-sm-3 col-md-4">コメント</h3>
                            <p class="mt-2 mb-0 col-10 ">{!! $micropost->content !!}</p>
                        </div>    
                        <div class="post mb-5" style="text-align:center;" >
                            <h3 class="badge badge-primary col-6 col-sm-3 col-md-4">スポット住所</h3>
                            <p class="mt-2 mb-0 col-10 " >{!! $micropost->map !!}</p>



                            {{link_to_route('microposts.map','スポット地図を見る！',['id'=>$micropost->id],['class'=>'btn btn-sm btn-primary microbtn','style'=>'margin:0 auto; background-color:white; color:blue'])}}


                       
                            
                            
                            
                            
                            
                        </div>    
                        
                        　　　　　

                        
                            
                    </div>
                   

                     <div style="display:flex; justify-content:center;">
                    


                    
                        <div style="margin-right:10px;">
                            
                                        @if(Auth::user()->is_favoring($micropost->id))
                                        {!! Form::open(['route'=>['micropost.unfav',$micropost->id],'method'=>'delete'])!!}
                                        {!! Form::submit('お気に入り解除',['class'=>'btn btn-sm btn-danger microbtn','style'=>'background-color:white; color:red;'])  !!}
                                        {!! Form::close()!!}
                                        @else
                                        {!! Form::open(['route'=>['micropost.fav',$micropost->id],'method'=>'post'])!!}
                                        {!! Form::submit('お気に入り',['class'=>'btn btn-sm btn-success microbtn','style'=>'background-color:white; color:green;'])  !!}
                                        {!! Form::close()!!}
                                        @endif
                           
                        </div>


                        <div style="margin-right:10px;">

                        @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm microbtn','style'=>'background-color:white; color:red;']) !!}
                            {!! Form::close() !!}
                        @endif

                        </div>


                        @if(Auth::id()==$micropost->user_id)
                            {!! link_to_route('microposts.edit','編集',['micropost'=>$micropost->id],['class'=>'btn btn-success btn-sm microbtn','style'=>'background-color:white; color:green;'])  !!}
                        @endif
                        
                        
                    </div>
                    
                    
                    
                    
                    
        </div>
        
        
    </li>
    @endforeach
    
</ul>
{{$microposts->links()}}
@else
  <p style="text-align:center;">投稿はありません</p>

@endif