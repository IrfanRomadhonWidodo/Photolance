<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    /**
     * Get the user that owns the feedback
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    protected $table = 'feedback';
    
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'status'
    ];
}