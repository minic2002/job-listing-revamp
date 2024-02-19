<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobListing;
use App\Models\UserResume;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_listing_id',
        'user_id',
        'resume_id',
        'first_name',
        'last_name',
        'tel',
        'education',
    ];

    public function job_listing()
    {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user_resume()
    {
        return $this->belongsTo(UserResume::class, 'resume_id');
    }
}
