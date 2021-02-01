<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    // Destroy created_at ann updated_at
    public $timestamps = false;

    // Mass assignment
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relation many to one
    public function position()
    {
        return $this->belongsTo(Participant::class);
    }

    // Mutaror
    public function getTakeImgAttribute()
    {
        return url('storage',  $this->img);
    }
}
