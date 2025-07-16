<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'playlist_id',
        'title',
        'artist',
        'link',
        'stage',
        'order',
    ];



    public function playlists()
    {
        return $this->belongsTo(Playlist::class);
    }
}


