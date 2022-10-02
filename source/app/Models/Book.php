<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    public function user(): BelongsTo{
        return $this->belongsTo('App\User');
    }

    protected $fillable =[
        'title','author','url',
        'type','content',
    ];
}
