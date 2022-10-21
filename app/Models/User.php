<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'status',
        'is_featured',
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

    static function getValidationRules(){
    	$rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required|same:confirmed',
		];
		return $rules;
    }

    public function hasUserProfile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function haveCourses()
    {
        return $this->hasMany(Course::class, 'slug', 'instructor_slug');
    }

    public function haveFollowers()
    {
        return $this->hasMany(Follower::class, 'user_slug', 'slug');
    }

    function haveFollowings()
    {
        return $this->hasMany(Follower::class, 'follower_slug', 'slug');
    }
    public function haveWishList()
    {
        return $this->hasMany(Wishlist::class, 'user_slug', 'slug');
    }
    public function haveStudents()
    {
        return $this->hasMany(EnrollStudent::class, 'instructor_slug', 'slug');
    }
}
