<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'username',
        'phone',
        'photo',
        'address',
        'status',
        'role',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRules($act = 'add')
    {
        $rules = [
            'full_name' => 'required|string',
            'username' => 'required|string',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'photo' => 'nullable|image|max:5120'
            // 'role' => 'required|in:admin,customer',
            // 'status' => 'required|in:Active,Inactive'
        ];

        if ($act == 'update') {
            $rules['photo'] = 'sometimes|image|max:5120';
        }

        return $rules;
    }
}
