<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];
    public static function uploadImageAvatar(Request $request, $image=null){
        if($request->hasFile('avatar')){
            if($image){
                Storage::delete($image);
            }
            $folder=date('Y-m-d');
            return $request->file('avatar')->store("images/{$folder}");
        }
        return null;
    }
    public function getImageAvatar(){
        if(!$this->avatar){
            return asset('no_image.png');
        }
        return asset("uploads/{$this->avatar}");
    }
}
