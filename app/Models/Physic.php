<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physic extends Model
{
    use HasFactory;

    protected $table = 'physics';
    protected $primaryKey = 'person_id';
    protected $fillable = [
        'person_id',
        'cpf',
        'date_birth',
        'genre'
    ];

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }
}
