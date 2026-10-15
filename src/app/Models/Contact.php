<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'consultations',
        'name',
        'email',
        'tel',
        'prefecture',
        'age',
        'initial_payment',
        'monthly_payment',
    ];

    protected $casts = [
        'consultations' => 'array',
    ];
}
