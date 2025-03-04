<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
