<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'hashtag',
        'slug'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user(){
        return $this->belongsTo("App\User");
    }

    public function tags(){
        return $this->belongsToMany("App\Questions");
    }
}
