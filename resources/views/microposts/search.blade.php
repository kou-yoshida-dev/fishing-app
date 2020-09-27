@extends('layouts.app')
@section('content')


{!! Form::open(['route'=>'microposts.result','method'=>'get','class'=>'col-12 col-md-8 mb-4 search '])  !!}
    <h2>検索</h2>
    <div class="form-group">
        {!! Form::label('region','地域',['class'=>'mr-3 badge badge-primary']) !!}
        <div class="form-control">
            {{Form::select('region',['北海道'=>'北海道','東北'=>'東北','関東'=>'関東','中部'=>'中部','近畿'=>'近畿','中国'=>'中国','四国'=>'四国','九州'=>'九州','その他'=>'その他','すべて'=>'すべて'],'すべて') }}
        </div> 

       
    </div>
    <div class="form-group">
        {!! Form::label('ganle','ジャンル',['class'=>'mr-3 badge badge-primary']) !!}
        <div class="form-control">
            海:{!! Form::radio( 'ganle','海',null,['class'=>'mr-1']) !!}
            川:{!! Form::radio( 'ganle','川',null,['class'=>'mr-1']) !!}
            湖:{!! Form::radio( 'ganle','湖',null,['class'=>'mr-1']) !!}
            その他:{!! Form::radio( 'ganle','その他',null,['class'=>'mr-1']) !!}
            すべて:{!! Form::radio( 'ganle','すべて',true,['class'=>'mr-1']) !!}
        </div> 

       
    </div>

    {!! Form::submit('検索',['class'=>'btn btn-light'])  !!}
{!! Form::close()  !!}



<div style="padding-left:20px;">
    <p>地域：{{$region}}</p>
    <p>ジャンル：{{$ganle}}</p>
</div>





<ul class="list-unstyled">
    @foreach($microposts as $micropost)
    <li class="medi mb-3 timeline col-12 col-sm-8 col-md-6">
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
                        <div class="post" style="text-align:center;" >
                            <h3 class="badge badge-primary col-6 col-sm-3 col-md-4">スポット住所</h3>
                            <p class="mt-2 mb-0 col-10 " >{!! $micropost->map !!}</p>


                       
                            
                            
                            
                            
                            
                        </div>    
                        
                        　　　　　

                        
                            
                    </div>
                    <div class="row mb-3">
                        {{link_to_route('microposts.map','スポット地図を見る！',['id'=>$micropost->id],['class'=>'btn btn-sm btn-primary microbtn','style'=>'margin:0 auto; background-color:white; color:blue'])}}
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


@endsection