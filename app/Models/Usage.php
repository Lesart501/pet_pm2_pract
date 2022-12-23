<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    public function status() {
        return $this->belongsTo(Status::class, 'statuses_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
    public function device() {
        return $this->belongsTo(Device::class, 'devices_id', 'id');
    }

    protected $fillable = ['statuses_id', 'users_id', 'devices_id', 'days'];
}
