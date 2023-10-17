<?php

namespace App\Models;

use App\Models\Poste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utili extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'poste',
        'password',
    ];
    public function poste()
    {
        return $this->belongsTo(Poste::class); 
    }
}
