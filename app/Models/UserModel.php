<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    use SoftDeletes;

    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type_id',
        'user_id',
    ];

    protected $appends = [ 'userType', ];

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

    protected function getUserTypeAttribute() {
        return UserTypeModel::find($this->attributes['user_type_id']);
    }
    protected function getUserIdAttribute() {
        return UserModel::find($this->attributes['user_id']);
    }

    public function userType(){
        return $this->hasOne('App\Models\UserTypeModel', 'id', 'user_type_id');
    }

    public function user(){
        return $this->hasOne('App\Models\UserModel', 'id', 'user_id');
    }
}
