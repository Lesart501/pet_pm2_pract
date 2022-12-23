<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    
    public function usage() {
        return $this->hasMany(Usage::class, 'id', 'id');
    }
}
