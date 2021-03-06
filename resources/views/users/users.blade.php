<div class=" pt-4 pl-4">

@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media ">
                
                
                 <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
               
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'ユーザー詳細', ['user' => $user->id],['class'=>'btn btn-light']) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
   
      {{ $users->links() }}
      
      
@endif


</div>