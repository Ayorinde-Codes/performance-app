<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function entity()
    // {
    //     return $this->hasOne(Entity::class, 'GenEntityID');
    // }

    // public static function entity($entityID)
    // {
    //     return Entity::where('GenEntityID', $entityID)->first();
    // }

    // public static function companyRule($entityID)
    // {
    //     return Employee::where('GenEntityID', $entityID)->first();
    // }

    // public function employee()
    // {
    //     return $this->hasOne(Employee::class, 'GenEntityID');
    // }

    public function role() 
    { 
        $userRole = UserRole::where('user_id',  Auth()->user()->id)->first(); 

        return $userRole->role->name;
    }

    public static function userRole()
    {
        return UserRole::where('user_id', Auth()->user()->id)->first();
    }

    public function businessUnit()
    {
        return $this->hasOne(UserBusinessUnit::class, 'user_id');
    }

    // public function userSupervisor()
    // {
    //     $usersupervisor = UserSupervisor::where('user_id',  Auth()->user()->GenEntityID)->first(); 

    //     return $this->entity($usersupervisor->primary_supervisor);
    // }
}
