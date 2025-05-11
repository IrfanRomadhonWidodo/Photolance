<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Booking;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    
    protected $fillable = [
        'image',
        'name',
        'email',
        'password',
        'role',
        'no_hp',
        'alamat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function boot()
    {
        parent::boot();
    
        static::saving(function ($user) {
            if ($user->isDirty('password') && !empty($user->password) && !password_get_info($user->password)['algo']) {
                $user->password = bcrypt($user->password);
            }
        });
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function bookings()
{
    return $this->hasMany(Booking::class);
}


}
