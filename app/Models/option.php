<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class option extends Model
{
    use HasFactory;
    protected $fillable=['options'];
    public function votes() :HasMany{

        return $this->hasMany(vote::class);

    }

    public function polls() :BelongsTo{

        return $this->belongsTo(poll::class);

    }
}
