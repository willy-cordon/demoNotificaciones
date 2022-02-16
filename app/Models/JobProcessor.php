<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobProcessor extends Model
{
    protected $fillable = ['title','status'];
    protected $casts = ['data'=>'json'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
