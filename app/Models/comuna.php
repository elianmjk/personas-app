<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comuna extends Model
{
    use HasFactory;
    protected $table='tb_comuna' ;
    protected $primarykey='comu_codigo';
    public $timestamp=false;
}
