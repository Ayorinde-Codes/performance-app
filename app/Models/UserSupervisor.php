<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSupervisor extends Model
{
    protected $table = 'user_supervisors';

    protected $guarded = [];

    protected $hidden = [
        'password', 'deleted_at',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');   
    }
}
