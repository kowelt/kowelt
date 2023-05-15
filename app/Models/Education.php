<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'educations';

    public function curriculum_vitae(): BelongsTo
    {
        return $this->belongsTo(CurriculumVitae::class);
    }

    public function ugg_form():BelongsTo
    {
        return $this->belongsTo(UggForm::class);
    }
}
