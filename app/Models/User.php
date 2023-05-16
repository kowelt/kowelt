<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const PAYMENT_METHOD_STRIPE = 'stripe';
    const PAYMENT_METHOD_TRANSFER = 'transfer';

/*    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'role',
        'password',
        'email_verified_at',
        'gender',
        'date_of_birth',
        'language',
        'cv_received_by_admin',
        'status',
        'note',
        'active_admin',
        'password_clear_text',
        'can_create_admin_account',
        'pdf_path',
    ];*/

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function curriculum_vitae(): HasOne
    {
        return $this->hasOne(CurriculumVitae::class);
    }

    public function ugg_form(): HasOne
    {
        return $this->hasOne(UggForm::class);
    }

//    public function picture(): HasOne
//    {
//        return $this->hasOne(Picture::class);
//    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function scopeWithAll($query)
    {
        $query->with(['curriculum_vitae', 'ugg_form', 'documents']);
    }

    public function isEmailVerify()
    {
        return $this->email_verified_at != null;
    }
}
