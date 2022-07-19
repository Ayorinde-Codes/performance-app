<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EmployeeEvaluation extends Model
{
    use HasFactory;

    protected $table = 'employee_evaluations';

    protected $guarded = [];

    public function performanceEvaluation(): BelongsTo
    {
        return $this->belongsTo(PerformanceEvaluation::class, 'performance_evaluation_id');
    }
}
