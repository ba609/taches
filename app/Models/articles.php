<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'prix',
        'dateDeDebut',
        'dateDeFin',
        'users_id',
    ];
}
