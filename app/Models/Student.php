<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_etudiant';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'code_etudiant',
        'prenom',
        'nom',
        'date_naissance',
        'telephone',
        'email_institutionnelle',
        'image',
        'user_id'
    ];
}
