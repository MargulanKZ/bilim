<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title','description','video'
    ];

    protected $dates = [
        'created_at',
        'updated-at'
    ];
}
