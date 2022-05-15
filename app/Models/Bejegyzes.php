<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bejegyzes extends Model
{
    protected $table= 'bejegyzes';
    protected $primaryKey='id';
    protected $fillable = [
        'tevekenyseg_id',
        'osztaly_id',
        'allapot'
    ];
    use HasFactory;
    public function Tevekenyseg()
    {
        return $this->hasOne(Tevekenyseg::class, 'tevekenyseg_id', 'tevekenyseg_id');
        //leeht olyan lekérést csinálni a controllerben , hogy a bejegyzésekkel együtt adja vissza a hozzátartozó tevékenységet
    }
}
