<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Micropost extends Model
{
    protected $fillable = ['content'];
    
    public function user(){
        return $this->belongsTo(User::class);
        
    }
    
    public function favorite_user(){
        return $this->belongsToMany(User::class,'favorites','micropost_id','user_id');
    }
    
    
    
}
