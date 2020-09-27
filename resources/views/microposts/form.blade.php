{!! Form::open(['route' => 'microposts.store','class'=>'col-12 tweet']) !!}
    <h2>釣りスポットを共有！</h2>


    <div class="form-group">
        {!! Form::label('region','地域',['class'=>'mr-3 badge badge-primary']) !!}
        <div class="form-control">
            {{Form::select('region',['北海道'=>'北海道','東北'=>'東北','関東'=>'関東','中部'=>'中部','近畿'=>'近畿','中国'=>'中国','四国'=>'四国','九州'=>'九州','その他'=>'その他',],'その他') }}
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
        {!! Form::textarea('content', old('content'), ['class' => 'form-control ', 'rows' => '2',]) !!}
        
    </div>
    <div class="form-groupe mb-4">
        {!! Form::label('map','スポット住所',['class'=>'mr-3 badge badge-primary']) !!}
        {!! Form::text('map', '', ['id'=>'result','class' => 'form-control mb-3', 'rows' => '2',]) !!}
        


        <p class="mt-2">*スポット位置をクリックすると住所が入力されます。</p>
        <div id="gmap" style="height:300px;width:100% ; margin:0 auto;"></div> <!-- 地図を表示する領域 -->


       
 
    </div>
    
    
   
   
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block ']) !!}
{!! Form::close() !!}


