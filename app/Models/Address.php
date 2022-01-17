<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $primaryKey = 'people_id';
    protected $fillable = [
        'people_id',
        'city',
        'district',
        'complement',
        'public_place',
        'uf',
        'county',
        'zip_code',
        'status'
    ];

    public function people()
    {
        return $this->hasOne(People::class);
    }
}
