<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use OwenIt\Auditing\Contracts\Auditable;

class Eleccion extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_modificado';

    protected $table = 'eleccion';

    protected $guarded = [
        'id'
    ];

    public function creador()
    {
        return $this->hasOne(User::class, 'id', 'id_creador');
    }
}
