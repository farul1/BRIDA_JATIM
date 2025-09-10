<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Field yang boleh diisi mass assignment
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'id_role',
        'id_bidang',
        'instansi',
        'jabatan',
        'telephone',
        'kepakaran',
    ];

    // Field yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting tipe data
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi User ke Bidang (belongsTo)
    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id');
    }
    public function forms()
    {
        return $this->hasMany(Form::class);
    }

}
