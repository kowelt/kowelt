<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UggForm extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    public function works(): HasMany
    {
        return $this->hasMany(Work::class);
    }

    public function hobbies(): HasMany
    {
        return $this->hasMany(Hobby::class);
    }

    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function picture(): HasOne
    {
        return $this->hasOne(Picture::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function scopeWithAll($query)
    {
        $query->with(['user', 'educations', 'works', 'hobbies', 'languages', 'skills', 'picture', 'documents']);
    }
}
