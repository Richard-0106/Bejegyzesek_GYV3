<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tevekenyseg extends Model
{
    protected $table= 'tevekenysegs';
    protected $primaryKey='tevekenyseg_id';
    protected $fillable = [
        'tevekenyseg_id',//ha automatikusan generálja akkor nem kell.
        'tevekenyseg_nev',
        'pontszam'
    ];
    use HasFactory;
}
