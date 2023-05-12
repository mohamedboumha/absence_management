<?php

namespace App\Models;

use App\Models\Prof;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ar', 'level', 'user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function profs() {
        return $this->hasMany(Prof::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('name_ar', 'like', '%' . request('search') . '%')
            ->orWhere('level', 'like', '%' . request('search') . '%');
        }
    }
}
