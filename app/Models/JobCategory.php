<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function job_listing()
    {
        return $this->hasOne(JobListing::class, 'job_category_id');
    }
}
