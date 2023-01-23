<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'is_read',
        'body'
    ];

    protected $appends = ['created_at_formatted'];

//    public const SENDER_TYPE_COMPANY = 1;
//    public const SENDER_TYPE_DEVELOPER = 2;

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public static function markAsReadForSender(int $sender)
    {
        return self::whereNot('sender_id', $sender)
            ->whereIsRead(false)
            ->update(['is_read' => true]);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }
}
