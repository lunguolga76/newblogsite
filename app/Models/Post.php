<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
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
}
