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
}
