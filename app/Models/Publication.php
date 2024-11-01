<?php

namespace App\Models;

use App\Models\Like;
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
}
