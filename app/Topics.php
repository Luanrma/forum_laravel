<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    protected $table = "topics";

   /* protected $fillable = [
        'title',
        'question'
    ];*/

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        //Campo para tratar url amigável
        //$this->attributes['slug'] = Str::slug($value);
    }
}
