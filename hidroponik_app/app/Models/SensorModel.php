<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorModel extends Model
{
    use HasFactory;

    protected $table = 'sensor';

    protected $fillable = ['suhu','kelembapan','ph','tds'];
    public $timestamps = false;
}
