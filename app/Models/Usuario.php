<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Usuario extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
}
