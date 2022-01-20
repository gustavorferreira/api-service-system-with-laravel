<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $primaryKey = 'person_id';
    protected $fillable = [
        'person_id',
        'city',
        'district',
        'complement',
        'public_place',
        'uf',
        'county',
        'zip_code'
    ];

    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
