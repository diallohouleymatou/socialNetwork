<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function comments(Request $request, $id)
    {
        $post = Publication::findOrFail($id);
            $post->commentaires()->create([
                'contenu'=>$request->contenu,
                'user_id'=>Auth::user()->id,
            ]);
        return back();
    }
}
