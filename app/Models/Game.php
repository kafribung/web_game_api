<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $touches = ['user'];

    // RouteKeyName
    public function getRouteKeyName()
    {
        return 'slug';   
    }

    // Mass assigment
    protected $guarded = [
        'created_at',
        'updated_at' 
    ];

    // Relation one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mutators
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
