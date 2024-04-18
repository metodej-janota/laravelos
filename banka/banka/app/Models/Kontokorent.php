<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banka;
use Illuminate\Notifications\Notifiable;

class Kontokorent extends Banka
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'penizeNaUcet',
        'aktivniKontokorent',
        'kontokorentLimit',
    ];
}
