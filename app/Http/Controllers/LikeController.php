<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $post = Publication::where('id',$id)->first();
        $post->likes()->create(['user_id'=>Auth::user()->id]);
        return back();
    }

    public function unlike($id)
    {
        $post = Publication::where('id',$id)->first();
        $like = Like::where('user_id',Auth::user()->id)->where('publication_id',$post->id);
        $like->delete();
        return back();

    }
}
