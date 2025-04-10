<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        
    ];
    
}
