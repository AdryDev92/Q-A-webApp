<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'slug',
        'content'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
