<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id','desc')->paginate(1);
         

        // ユーザ一覧ビューでそれを表示
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
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->count();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
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
