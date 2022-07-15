<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerformanceSheet extends Model
{
    use HasFactory;
    CONST ADMIN_STATUS = 'approved_by_admin';
    CONST USER_STATUS = 'approved_by_user';
    CONST SUPERVISOR_STATUS = 'approved_by_supervisor';
    CONST MANAGER_STATUS = 'approved_by_manager';
    CONST BUSINESS_UNIT_STATUS = 'approved_by_business_unit';


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');   
    }

}
