<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $uploads = '/assets/img/';
    protected $fillable = ['file', 'url'];

    public function getFileAttribute($photo) {
        return $this->uploads . $photo;
    }

}
