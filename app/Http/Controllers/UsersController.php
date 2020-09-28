<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        // ユーザ一覧
        $users = User::orderBy('id','desc')->paginate(1);
         
        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id){
        $user=User::findOrFail($id);
        
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(3);
        
        $user->count();
      
      
        return view('users.show',['user'=>$user,'microposts'=>$microposts,]);
    }
    public function followings($id){
        $user=User::findOrFail($id);
        $user->count();
        $followings=$user->followings()->paginate(10);
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }
    
    
    public function followers($id)
    {
        $user = User::findOrFail($id);

        // ページネートの為
        $user->count();

        // フォロワー一覧を
        $followers = $user->followers()->paginate(10);

        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    
    public function favorite($id){
        $user=User::findOrfail($id);
        $microposts=$user->favorite()->paginate(2);
        $user->count();
        return view('users.favorites',['microposts'=>$microposts,'user'=>$user]);
    }
    
    
    
    
}
