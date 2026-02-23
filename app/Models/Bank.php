<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    /** @use HasFactory<\Database\Factories\BankFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
