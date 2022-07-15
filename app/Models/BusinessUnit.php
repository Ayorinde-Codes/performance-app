<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    use HasFactory;

    protected $table = 'business_units';

    protected $guarded = [];

    public function userBusinessUnit()
    {
        return $this->hasOne(UserBusinessUnit::class, 'business_unit_id');
    }
}
