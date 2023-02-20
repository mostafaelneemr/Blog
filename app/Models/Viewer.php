<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;
    protected $table = "viewers";
    protected $fillable = ['name', 'viewers'];
    public $timestamps = false;
}
