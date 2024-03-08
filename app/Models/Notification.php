<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'application_id',
        'message',
        'read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_application()
    {
        return $this->belongsTo(JobApplication::class, 'application_id');
    }
}
