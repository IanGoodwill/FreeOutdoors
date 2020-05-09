<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class LikeController extends Controller
{
    public function actOnPost(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Post::where('id', $id)->increment('likes_count');
                break;
            case 'Unlike':
                Post::where('id', $id)->decrement('likes_count');
                break;
        }
        
        return '';
    }
    public function likePost($id)
    {
        $this->handleLike('App\Post', $id);
        return redirect()->back();
    }
    public function likeComment($id)
    {
        $this->handleLike('App\Comment', $id);
        return redirect()->back();
    }
    public function handleLike($type, $id)
    {
        $user = User::findOrFail($id);

        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikesId($id)->where("user_id", "=", $user->id)->firstOrFail();
        if (is_null($existing_like)) {
            Like::create([
                'user_id' => User::id(),
                'likes_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    
}
    }
