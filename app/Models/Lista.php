<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eleccion;
use App\Models\Candidato;
use OwenIt\Auditing\Contracts\Auditable;


class Lista extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'lista';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function eleccion()
    {
        return $this->belongsTo(Eleccion::class, 'id_eleccion');
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class, 'id_lista');
    }
}
