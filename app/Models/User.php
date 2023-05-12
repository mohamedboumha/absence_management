<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\School;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'f_name',
        'f_name_ar',
        'l_name',
        'l_name_ar',
        'email',
        'password',
        'role',
        'ppr',
        'cni'
    ];

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

    public function schools() {
        return $this->hasMany(School::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('f_name', 'like', '%' . request('search') . '%')
            ->orWhere('l_name', 'like', '%' . request('search') . '%')
            ->orWhere('f_name_ar', 'like', '%' . request('search') . '%')
            ->orWhere('l_name_ar', 'like', '%' . request('search') . '%')
            ->orWhere('cni', 'like', '%' . request('search') . '%')
            ->orWhere('ppr', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%');
        }
    }
}
