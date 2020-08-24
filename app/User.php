<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Micropost;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function microposts(){
        return $this->hasMany(Micropost::class);
    }
    public function count(){
      
         $this->loadCount(['microposts','followings','followers','favorite']);
    }
    public function followings(){
        return $this->belongsToMany(User::class,'user_follow','user_id','follow_id');
    }
   public function followers(){
       return $this->belongsToMany(User::class,'user_follow','follow_id','user_id');
   }
   
   
   public function follow($userId){
       $exist=$this->is_following($userId);
       $its_me=$this->id==$userId;
       if($exist||$its_me){
           return false;
       }else{
           $this->followings()->attach($userId);
           return true;
       }
   }
   
   
   public function unfollow($userId){
       $exist= $this->is_following($userId);
       $its_me=$this->id==$userId;
       if($exist && !$its_me){
           $this->followings()->detach($userId);
           return true;
           
       }else{
           return false;
       }
   }
    
    public function is_following($userId){
        return $this->followings()->where('follow_id',$userId)->exists();
        
    }
    
    
    public function feed_microposts()
    {
        // このユーザがフォロー中のユーザのidを取得して配列にする
        $userIds = $this->followings()->pluck('users.id')->toArray();
        // このユーザのidもその配列に追加
        $userIds[] = $this->id;
        // それらのユーザが所有する投稿に絞り込む
        return Micropost::whereIn('user_id', $userIds);
    }
    
    
   public function favorite(){
       return $this->belongsToMany(Micropost::class,'favorites','user_id','micropost_id');
   }
   
   
   
   public function fav($micropostId){
       $exist=$this->is_favoring($micropostId);
       if($exist){
           return false;
       }else{
           $this->favorite()->attach($micropostId);
           return true;
       }
   }
   
   public function unfav($micropostId){
       $exist=$this->is_favoring($micropostId);
       if($exist){
            $this->favorite()->detach($micropostId);
           return true;
          
       }else{
           return false;
       }
   }
   
   
   
   
   
   
   public function is_favoring($micropostId){
       return $this->favorite()->where('micropost_id',$micropostId)->exists();
   }
    
}
