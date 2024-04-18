<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banka;

class SporitelskyUver extends Banka
{
    use HasFactory;

    protected $fillable = [
        'aktivniSporitelskyUver',
        'dohromady',
        'uver',
    ];
}
