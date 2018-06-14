<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'content'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
