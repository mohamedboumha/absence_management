<?php

namespace App\Models;

use App\Models\Prof;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'start',
        'end',
        'motif',
        'justification',
    ];

    public function prof() {
        return $this->belongsTo(Prof::class);
    }
    
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('start', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%')
            ->orWhere('justification', 'like', '%' . request('search') . '%')
            ->orWhere('end', 'like', '%' . request('search') . '%');
        }
    }
}
