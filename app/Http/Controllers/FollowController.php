<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    //
    public function follow(Request $request, User $user){
      Auth::user()->following()->attach($user->id);
      //$user->followers()->attach(Auth::user()->id)
      return redirect()->back();
    }

    public function unfollow( Request $request, User $user){
        Auth::user()->following()->detach($user->id);
        //$user->followers()->detach(Auth::user()->id)
        return redirect()->back();
    }
}
