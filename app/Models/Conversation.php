<?php

namespace App\Models;

use App\Models\Traits\CurrentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory, CurrentUser;

    protected $fillable = [
        'sender_id',
        'receiver_id'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id', 'users');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id', 'users');
    }

    public function scopeForSender($q, int $id = null)
    {
        return $q->whereSenderId($id ?? auth()->id());
    }

    public function scopeForReceiver($q, int $id = null)
    {
        return $q->whereReceiverId($id ?? auth()->id());
    }

    public function scopeForUser($q, int $id = null)
    {
        $id = $id ?? auth()->id();

        $q->where('receiver_id', $id)->orWhere('sender_id', $id);
    }

    public static function isDuplicate(int $senderId = null)
    {
        return self::forSender($senderId)->exists();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getCompanionProfile()
    {
        return $this->sender_id === auth()->id()
            ? $this->receiver->developerProfile?->only('id', 'full_name', 'avatar')
            : $this->sender->companyProfile?->only('id', 'name', 'avatar');
    }

//    protected $appends = ['created_at_formatted'];
//
//    public function scopeForCompany($q, int $id = null)
//    {
//        $q->whereHas('companyProfile', fn($q) => $q->my());
//    }
//
//    public function scopeForDeveloper($q, int $id = null)
//    {
//        $q->whereHas('developerProfile', fn($q) => $q->my());
//    }
//
//    public function scopeForUser($q, int $id = null)
//    {
//        $q->whereHas('companyProfile', fn($q) => $q->my())
//            ->orWhereHas('developerProfile', fn($q) => $q->my());
//    }
//

//
//    public function getCurrentUserType(): int
//    {
//        return $this->company_profile_id === auth()->id()
//            ? Message::SENDER_TYPE_COMPANY
//            : Message::SENDER_TYPE_DEVELOPER;
//    }
//

//
//    public function developerProfile()
//    {
//        return $this->belongsTo(DeveloperProfile::class, 'developer_profile_id', 'id', 'developer_profiles');
//    }
//
//    public function companyProfile()
//    {
//        return $this->belongsTo(CompanyProfile::class, 'company_profile_id', 'id', 'company_profiles');
//    }
//
//    public function messages()
//    {
//        return $this->hasMany(Message::class);
//    }
//
//    public function getCreatedAtFormattedAttribute()
//    {
//        return $this->created_at->format('d-m-Y');
//    }
}
