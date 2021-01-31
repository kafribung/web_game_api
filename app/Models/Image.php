<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    // Destroy created_at ann updated_at
    public $timestamps = false;

    // Relation many to one
    public function position()
    {
        return $this->belongsTo(Participant::class);
    }
}
