@if(count($errors)>0)
<ul class="alert alert-danger" role="alert">
    @foreach($errors->all() as $error )
       <li>{{$error}}</li>
    @endforeach
    
</ul>


@endif
