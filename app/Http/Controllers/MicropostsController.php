<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Micropost;
use Auth;
class MicropostsController extends Controller
{
    public function index(){
        $data=[];
        if(Auth::check()){
            $user=Auth::user();
            $microposts=$user->feed_microposts()->orderBy('created_at','desc')->paginate(4);
            $microposts_all=Micropost::All();
            $microcount=$user->count();
            $data=[
                'user'=>$user,
                'microposts'=>$microposts,
                'microposts_all'=>$microposts_all
                ];
        }
        
        return view('welcome',$data);
        
        
       
        
        
        
        
        
        
        
        
        
    }
    
    public function store(Request $request){
        $request->validate([
            'content'=>'required|max:255',

            ]);
            
            
        $request->user()->microposts()->create([
            'content'=>$request->content,
            'ganle'=>$request->ganle,
            'region'=>$request->region,
            'map'=>$request->map,
            ]);
            
        return back();    
        
    }

    public function edit($id){
        $micropost=Micropost::findOrFail($id);
        return view('microposts.edit',['micropost'=>$micropost]);
    }


    public function update(Request $request,$id){
        $micropost=Micropost::findOrfail($id);
        $micropost->content=$request->content;
        $micropost->region=$request->region;
        $micropost->ganle=$request->ganle;
        $micropost->save();

        return redirect('/');

    }
    
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $micropost = Micropost::findOrFail($id);

        // ユーザがその投稿の所有者である場合投稿を削除
        if (Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        // 前のURLへリダイレクト
        return back();
    }





    public function search(){
        $microposts_all=Micropost::All();
        $region='すべて';
        $ganle='すべて';
        return view('microposts.search',['microposts'=>$microposts_all,'region'=>$region,'ganle'=>$ganle]);
    }

    public function result(Request $request){
        
        $region=$request->region;
        $ganle=$request->ganle;
        
        if($region=='すべて' && $ganle!='すべて'){
            $microposts=Micropost::where('ganle',$ganle)->get();

        }elseif($ganle=='すべて' && $region!='すべて'){
            $microposts=Micropost::where('region',$region)->get();
        }elseif($region =='すべて' and $ganle =='すべて'){
            $microposts=Micropost::All();

        }else{
            $microposts=Micropost::where('region',$region)->where('ganle',$ganle)->get();

        }


        return view('microposts.search',['microposts'=>$microposts,'region'=>$region,'ganle'=>$ganle]);
    }






    public function map($id){
        $micropost=Micropost::where('id',$id)->first();

        $map=$micropost->map;

        return view('microposts.map',['map'=>$map]);

    }
}
