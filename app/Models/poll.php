<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class poll extends Model
{
    use HasFactory;
    protected $fillable=['title'];
    public function options() :HasMany{

        return $this->hasMany(option::class);

    }
}

