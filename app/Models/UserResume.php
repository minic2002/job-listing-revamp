<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'resume_url'
    ];

    public function private_resume_url()
    {
        // Check if resume_url exists
        if ($this->resume_url) {
            return Storage::disk('s3')->temporaryUrl($this->resume_url, now()->addMinutes(5));
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_application()
    {
        return $this->hasMany(JobApplication::class, 'resume_id');
    }
}
