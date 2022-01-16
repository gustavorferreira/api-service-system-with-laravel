<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physic extends Model
{
    use HasFactory;

    protected $table = 'physics';
    protected $fillable = [
        'id_people',
        'cpf',
        'date_birth',
        'genre'
    ];
}
