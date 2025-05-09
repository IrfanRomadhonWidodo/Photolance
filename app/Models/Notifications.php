<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'reference_id',
        'message',
        'read',
    ];

    /**
     * Get the user that owns the notification
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get related feedback if type is feedback_response
     */
    public function feedback()
    {
        if ($this->type === 'feedback_response') {
            return $this->belongsTo(Feedback::class, 'reference_id');
        }
        return null;
    }
}
