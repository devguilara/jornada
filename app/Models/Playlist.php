<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;


    protected $fillable = [ 
        'name',
        'description',
        'user_id',
        //'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
