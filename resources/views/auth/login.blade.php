@extends('layouts.app')

@section('content')
    <div class="text-center" >
        <h1 class="mb-3 mt-3" style="color:black; margin:0 auto;">ログイン</h1>
    </div>

    <div class="row">
        <div class="col-8 col-sm-6 offset-sm-3" style="margin:0 auto;">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2 mb-5">新規登録はこちら！ {!! link_to_route('signup.get', 'いますぐ登録!') !!}</p>




            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group" style="display:none;">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', 'aaa@a.com', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group" style="display:none;">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::text('password','1111aaaa', ['class' => 'form-control'],'aa') !!}
                </div>

                {!! Form::submit('ゲストログイン', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}





            



        </div>
    </div>
@endsection