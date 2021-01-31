<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    // Touches
    protected $touches = ['position'];

    // Relation many to one
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Relation one to many
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
