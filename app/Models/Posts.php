<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path', 
        'descriptions', 
        'user_id', 
        'date_post',
    ];

    public $appends = ['countComments','countLikes'];

    public function getCountCommentsAttribute(){
        return $this->comments->count();
    }

    public function getCountLikesAttribute(){
        return $this->likes->count();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(comments::class, 'post_id');
    }

    public function likes(){
        return $this->hasMany(likes::class, 'post_id');
    }

    public static function createPost($request){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $url = null;

        $storage = Storage::disk('public')->put($name,$file);
        $url = asset('storage/'.$storage);

        $post = (new static)::create([
            'image_path'=>$url, 
            'descriptions'=>$request->text, 
            'user_id'=>Carbon::now(), 
            'date_post'=>Auth::id(),
        ]);

        return (new static)::with([
            'user',
            'comments',
            'likes'
        ])->find($post->id);
    }
}
