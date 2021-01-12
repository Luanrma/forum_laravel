<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";

    protected $fillable = [
        'title',
        'response'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    { 
        return $this->belongsTo(Topic::class);
    }

}
