<?php

namespace App\Http\Controllers;

use App\Models\KeyResultArea;
use Illuminate\Http\Request;
use App\Models\PerformanceEvaluation;

class PerformanceEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $performances = PerformanceEvaluation::all();

        $user = auth()->user();

        $keyResultAreas = KeyResultArea::all();

        return view('performance', compact('performances', 'user', 'keyResultAreas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        dd($request->all());
        
    }

}

// $table->unsignedInteger('user_id');
// $table->string('key_result_area');
// $table->string('key_performance_indicator');
// $table->integer('weight');
// $table->integer('self_score')->nullable();
// $table->integer('supervisor_score')->nullable();
// $table->integer('manager_score')->nullable();
// $table->integer('business_unit_score')->nullable();
// $table->integer('total_score')->nullable();
// $table->string('self_comment')->nullable();
// $table->string('supervisor_comment')->nullable();
// $table->string('manager_comment')->nullable();
// $table->string('business_unit_comment')->nullable();
// $table->string('status')->default('pending');
// $table->timestamp('last_edited_at')->nullable();