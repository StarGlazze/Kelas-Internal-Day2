<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'judul',
        'isi',
        'foto',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
