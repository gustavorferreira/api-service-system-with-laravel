<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $primaryKey = 'people_id';
    protected $fillable = [
        'people_id',
        'natioal_code',
        'ddd_code',
        'phone_number',
        'email',
        'observation',
        'status'
    ];

    public function people()
    {
        return $this->hasOne(People::class);
    }
}
