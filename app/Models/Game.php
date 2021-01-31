<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $touches = ['user'];

    protected $guarded = [
        'created_at',
        'updated_at' 
    ];

    // Relation one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Mutators
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
