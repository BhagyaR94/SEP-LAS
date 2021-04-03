<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'initials',
        'last_name',
        'designation',
        'date_joined',
        'primary_address',
        'secondary_address',
        'primary_contact',
        'secondary_contact',
        'user_name',
        'email',
        'password',
        'user_type',
    ];

}
