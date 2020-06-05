<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $fillable = [
        'status_id',
        'user_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
