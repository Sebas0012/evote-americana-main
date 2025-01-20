<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lista;
use OwenIt\Auditing\Contracts\Auditable;

class Candidato extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'candidato';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function lista()
    {
        return $this->belongsTo(Lista::class, 'id_lista');
    }
}
