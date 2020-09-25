@extends('layouts.app')
@section('content')



<h1>{{$micropost->id}}の編集画面</h1>


{!! Form::open(['route' => ['microposts.update',$micropost->id],'method'=>'put']) !!}
    


    <div class="form-group">
        {!! Form::label('region','地域',['class'=>'mr-3 badge badge-primary']) !!}
        <div class="form-control">
            {{Form::select('region',['北海道'=>'北海道','東北'=>'東北','関東'=>'関東','中部'=>'中部','近畿'=>'近畿','中国'=>'中国','四国'=>'四国','九州'=>'九州','その他'=>'その他',],$micropost->region) }}
        </div> 

       
    </div>
    <div class="form-group">
        {!! Form::label('ganle','ジャンル',['class'=>'mr-3 badge badge-primary']) !!}
        <div class="form-control">
            海:{!! Form::radio( 'ganle','海',null,['class'=>'mr-3']) !!}
            川:{!! Form::radio( 'ganle','川',null,['class'=>'mr-3']) !!}
            湖:{!! Form::radio( 'ganle','湖',null,['class'=>'mr-3']) !!}
            その他:{!! Form::radio( 'ganle','その他',null,['class'=>'mr-3']) !!}
        </div> 

       
    </div>
   
    <div class="form-groupe mb-4">
        {!! Form::label('content','コメント',['class'=>'mr-3 badge badge-primary']) !!}
        {!! Form::textarea('content', $micropost->content,['class' => 'form-control ', 'rows' => '2']) !!}
        
    </div>
   
        {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block ']) !!}
{!! Form::close() !!}



@endsection