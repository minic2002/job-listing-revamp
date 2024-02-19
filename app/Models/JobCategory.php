<?php

namespace App\Models;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function job_listing()
    {
        return $this->hasOne(JobListing::class, 'job_category_id');
    }
}
