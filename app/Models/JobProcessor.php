<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobProcessor extends Model
{
    protected $fillable = ['title','status'];
    protected $casts = ['data'=>'json'];
}
