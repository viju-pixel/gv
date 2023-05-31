<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentOpening extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'title',
        'description',
    ];
}
