<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Auditoria extends Model
{
    use HasFactory;

    protected $table = 'audits';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
