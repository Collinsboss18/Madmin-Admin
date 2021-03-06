<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'photo_id',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be cast to native types.
     * Role -> Relation
     * @var function
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * The attributes that should be cast to native types.
     * Photo -> Relation
     * @var function
     */
    public function photo() {
        return $this->belongsTo(Photo::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function setPasswordAttribute($password) {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

}
