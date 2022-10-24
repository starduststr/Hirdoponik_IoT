<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetParameterModel extends Model
{
    use HasFactory;

    protected $table = 'set_parameter';

    protected $fillable = ['nama_tanaman', 'usia_tanam','ph','ppm', 'aksi_ph', 'aksi_ppm'];
    public $timestamps = false;
}
