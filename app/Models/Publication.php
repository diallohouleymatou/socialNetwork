<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    //
    protected $fillable =[
        'texte',
        'photo',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
