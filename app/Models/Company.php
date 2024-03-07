<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobListing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'logo_url',
        'address',
        'city',
        'state',
        'postal',
        'tel',
        'email',
        'website'
    ];

    public function image_url()
    {
        // Check if logo_url is set
        if ($this->logo_url) {
            return Storage::disk('s3')->url($this->logo_url);
        }

        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_listing()
    {
        return $this->hasMany(JobListing::class, 'company_id');
    }
}
