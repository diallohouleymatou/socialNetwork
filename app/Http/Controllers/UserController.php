<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request){
        if ($request->isMethod('post')){
            $requestValide = $request->validate([
                'username'=>"min:3|required",
                'prenom'=>"min:4|required",
                'nom'=>"min:2|required",
                'email'=>"email|required",
                'password'=>"min:6|required",

            ]);
            $userExist = User::where('username',$requestValide['username'])->first();
            if (!$userExist){
                $user = new User();
                $user->username = $requestValide['username'];
                $user->prenom = $requestValide['prenom'];
                $user->nom = $requestValide['nom'];
                $user->email = $requestValide['email'];
                $user->password = Hash::make($requestValide['password']);
                $user->bio ="hey I am using Breeze";
                $user->save();
                return redirect ('/login')->with('success','Inscription reussie');
            }
            return redirect ('/register')->with('error','username deja utilise');
        }
        return view('register');

    }
    public function login( Request $request){
        if ($request->isMethod('post')){
            if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
                return redirect('/dashboard');
            }
            return redirect ('/login')->with('errorc','username ou mdp incorrect');
        }
        return view ('login');
    }

    public function home(){
        $posts = Publication::latest()->get();
        return view('home',compact('posts'));
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function feed(){
        $posts = Publication::latest()->get();
        return view('feed',compact('posts'));
    }

    public function deconnexion(){
        Auth::logout();
        return redirect('/login');
    }

    public function search(Request $request){
        $users = User::where('username','LIKE','%'.$request->search.'%')->where('id','!=',Auth::user()->id)->get();
        return view('Results',compact('users'));
    }

    public function profile(){
        return view('profile');
    }

    public function edit(Request $request){
        if($request->isMethod('put')){
            $requestValide = $request->validate([
                'username'=>"min:3|required",
                'prenom'=>"min:4|required",
                'nom'=>"min:2|required",
                'email'=>"email|required",
                'bio'=>"required",

            ]);
        $current = Auth::user();
        $user = User::where('username',$requestValide['username'])->first();
        if(!$user||$current->username == $requestValide['username']){
            $current->username = $requestValide['username'];
            $current->prenom = $requestValide['prenom'];
            $current->nom = $requestValide['nom'];
            $current->email = $requestValide['email'];
            $current->bio = $requestValide['bio'];
            $current->save();
            return redirect('/profile')->with('success','profil mis a jour avec succes');
        }
            return redirect('/edit')->with('error',"erreur nom d'utilisateur");

        }

        return view('edit');
    }

    public function edit_password(Request $request){
       if($request->isMethod('put')){
        $requestValide = $request->validate([
            "current_password"=>"min:6|required",
            "new_password"=>"min:6|confirmed|required",
        ]);
        $current = Auth::user();
        if(Hash::check($requestValide['current_password'],$current->password)){
            $current->password = Hash::make($requestValide['new_password']);
            $current->save();
            return redirect ('/profile')->with('success','Mot de pass mis a jour avec success');
        }


       }
    return view('edit_password');
    }

}
