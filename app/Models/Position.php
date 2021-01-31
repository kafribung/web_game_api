<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    // ! Destroy created_at ann updated_at
    protected $timestamp = false;

    // Relation one to many
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
