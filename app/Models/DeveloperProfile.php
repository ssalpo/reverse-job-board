<?php

namespace App\Models;

use App\Models\Traits\CurrentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperProfile extends Model
{
    use HasFactory, CurrentUser;

    protected $fillable = [
        'user_id',
        'full_name',
        'hero',
        'city',
        'avatar',
        'bio',
        'search_status',
        'experience_level',
        'start_date',
        'website',
        'github',
        'vkontakte',
        'twitter',
        'linkedin',
        'stackoverflow',
    ];

    public const SEARCH_STATUS_OPEN = 2;

    public function scopeFilter($q, $data): void
    {
        $q->when(isset($data['experience_level']), fn($q) => $q->whereExperienceLevel($data['experience_level']));
    }
}
