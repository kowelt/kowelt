<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function curriculum_vitae(): BelongsTo
    {
        return $this->belongsTo(CurriculumVitae::class);
    }

    public function ugg_form():BelongsTo
    {
        return $this->belongsTo(UggForm::class);
    }

    public function new(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
