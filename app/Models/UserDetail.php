<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'age',
        'gender',
        'address',
        'tel',
        'profile_logo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profile_url()
    {
        if ($this->profile_logo) {
            return Storage::disk('s3')->url($this->profile_logo);
        }
    
        return null;
    }
}
