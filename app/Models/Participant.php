<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    // Relation one to many
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}