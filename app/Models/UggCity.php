<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UggCity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ugg_session(): BelongsTo
    {
        return $this->belongsTo(UggSession::class);
    }
}
