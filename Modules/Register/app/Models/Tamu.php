<?php

namespace Modules\Register\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Register\Database\Factories\TamuFactory;

class Tamu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): TamuFactory
    // {
    //     // return TamuFactory::new();
    // }
}
