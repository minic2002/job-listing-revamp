<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobListing extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'job_category_id',
        'min_monthly_salary',
        'max_monthly_salary',
        'job_title',
        'description',
        'employment_type',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function job_application()
    {
        return $this->hasMany(JobApplication::class, 'job_listing_id');
    }

    public function scopeSearch($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('job_title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('employment_type', 'like', '%' . request('search') . '%')
            ;
        }
    }
}
