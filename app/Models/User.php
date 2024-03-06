<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Company;
use App\Models\JobListing;
use App\Models\UserDetail;
use App\Models\UserResume;
use App\Models\JobApplication;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_detail()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function user_resume()
    {
        return $this->hasMany(UserResume::class, 'user_id');
    }

    public function company()
    {
        return $this->hasMany(Company::class, 'user_id');
    }

    public function job_listing()
    {
        return $this->hasMany(JobListing::class, 'user_id');
    }

    public function job_application()
    {
        return $this->hasMany(JobApplication::class, 'user_id');
    }
}
