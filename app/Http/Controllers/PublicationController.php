<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function publication(Request $request){
        if($request->isMethod('post')){
            $requestValide = $request->validate([
                'texte'=>"min:5|required",

            ]);
            $publication = new Publication();
            $publication->texte=$requestValide['texte'];
            $publication->user_id = Auth::user()->id;
            $publication->save();
            return redirect ('/feed');

        }
        return view('publication');
       }

}
