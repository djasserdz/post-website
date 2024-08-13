<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Gate;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'body',
        'image_path'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    
}
