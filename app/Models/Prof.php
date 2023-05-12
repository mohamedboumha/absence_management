<?php

namespace App\Models;

use App\Models\School;
use App\Models\Absence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prof extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name',
        'f_name_ar',
        'l_name',
        'l_name_ar',
        'ppr',
        'cni',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function absences() {
        return $this->hasMany(Absence::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('f_name', 'like', '%' . request('search') . '%')
            ->orWhere('l_name', 'like', '%' . request('search') . '%')
            ->orWhere('f_name_ar', 'like', '%' . request('search') . '%')
            ->orWhere('l_name_ar', 'like', '%' . request('search') . '%')
            ->orWhere('cni', 'like', '%' . request('search') . '%')
            ->orWhere('ppr', 'like', '%' . request('search') . '%');
        }
    }
}
