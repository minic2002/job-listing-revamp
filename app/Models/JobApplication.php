<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobListing;
use App\Models\UserResume;
use App\Models\Notification;
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

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'application_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['application_id'] ?? false) {
            $query->where('id', request('application_id'));
        }
    }
}
