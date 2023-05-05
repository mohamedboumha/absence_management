<?php

namespace App\Models;

use App\Models\Prof;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function profs() {
        return $this->hasMany(Prof::class);
    }
}
