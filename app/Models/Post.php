<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable=['title','description','content','category_id','thumbnail'];

    public function tags(){
        return $this->belongsToMany(\App\Models\Tag::class)->withTimestamps();
    }
    public function category(){
        return $this->belongsTo(\App\Models\Category::class);

    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function uploadImage(Request $request, $image=null){
        if($request->hasFile('thumbnail')){
            if($image){
                Storage::delete($image);
            }
            $folder=date('Y-m-d');
             return $request->file('thumbnail')->store("images/{$folder}");
        }
        return null;
    }
    public function getImage(){
        if(!$this->thumbnail){
            return asset('no_image.png');
        }
        return asset("uploads/{$this->thumbnail}");
    }
    public function getPostDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('d F,Y');
    }
    public function scopeLike($query,$s){
        return $query->where('title','LIKE',"%{$s}%");

  }
//public function getTitleAttribute($value){
    //   $this->attributes['title']=Str::title($value);
  //}

  /* public function setTitleAttribute($value){
        return Str::upper($value);
   }*/
}
