<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    //for the images path
    protected $imagePath = '/images/';

    //its accessor 
    //has to getPATH as Path is the actual field in the table photo 
    //that we are trying to get
    public function getPathAttribute($photo){
        return $this->imagePath . $photo;
    }
}
