<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroVoto extends Model
{
    use HasFactory;

    protected $table = 'registro_voto';

    protected $guarded = [
        'id'
    ];
}
