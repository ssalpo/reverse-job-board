<?php

namespace App\Models;

use App\Models\Traits\CurrentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory, CurrentUser;

    protected $hidden = [
        'is_subscribed'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'website',
        'bio',
        'avatar',
        'personal_name',
        'job_title',
        'is_subscribed'
    ];

    protected $casts = [
        'is_subscribed' => 'boolean'
    ];
}
