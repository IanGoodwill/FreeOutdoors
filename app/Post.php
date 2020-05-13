<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Post extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    //
    protected $fillable = array(
        'content',
        'picture',
        'comments_count',
        'posted_at'
    );

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function liked()
    {
      return (bool) Like::where('user_id', Auth::id())
        ->where('post_id', $this->id)
        ->first();
    }
  
    public function likes()
    {
      return $this->hasMany(Like::class, 'post_id');
    }

    public function imageUpload()
    {
        return view('imageUpload');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost()
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);

        return back()

            ->with('success', 'You have successfully upload image.')

            ->with('image', $imageName);
    }
}
