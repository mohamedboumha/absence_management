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
        'l_name',
        'ppr',
        'cni',
    ];

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function absences() {
        return $this->hasMany(Absence::class);
    }
}
