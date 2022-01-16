<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physic extends Model
{
    use HasFactory;

    protected $table = 'physics';
    protected $fillable = [
        'people_id',
        'cpf',
        'date_birth',
        'genre'
    ];

    public function people()
    {
        return $this->hasOne(People::class);
    }
}
