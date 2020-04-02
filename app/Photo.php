<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
     protected $fillable = [
        'file',
    ];

   public function getFileAttribute($value)
    {
        $directory = '/codehacking/public/images/';

        return $directory. $value;
    }

}
