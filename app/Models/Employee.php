<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Gunakan id sebagai primary key
    public $incrementing = false; // Matikan auto-increment default Laravel
    protected $keyType = 'string'; // ID berupa string

    protected $fillable = [
        'name',
        'email',
        'user_id', 
        'kategori',
        'portofolio',
        'image',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

        public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
    
    // Scope to get only approved photographers
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
    protected $casts = [
        'foto' => 'array',
    ];
    
}
