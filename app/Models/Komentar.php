<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';

    protected $fillable = ['post_id', 'user_id' , 'isi'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
