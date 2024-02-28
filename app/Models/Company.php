<?php

namespace App\Models;

use App\Models\User;
use App\Models\JobListing;
use Illuminate\Database\Eloquent\Model;
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job_listing()
    {
        return $this->hasMany(JobListing::class, 'company_id');
    }
}
