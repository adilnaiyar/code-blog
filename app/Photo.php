<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $upload = '../images/';
    
     protected $fillable = [
        'file',
    ];

   public function getFileAttribute($value)
    {
        // $directory = '/codehacking/public/images/';

        // return $directory. $value;  

        return $this->upload.$value;
    }

}
