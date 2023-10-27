<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAttempt extends Model
{
    use HasFactory;

    protected $table = 'request_attempts';

    protected $fillable = ['ip_address', 'attempts', 'updated_at'];

    protected $casts = [
        'updated_at' => 'datetime',
    ];
}
