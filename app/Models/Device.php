<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function category() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
    
    public function usage() {
        return $this->hasMany(Usage::class, 'usages_id', 'id');
    }

    protected $fillable = ['name', 'categories_id', 'description', 'number', 'image'];
}
