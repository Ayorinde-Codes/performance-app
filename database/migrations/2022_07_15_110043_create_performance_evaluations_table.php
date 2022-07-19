<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceEvaluationsTable extends Migration
{
    protected $schemaTable = 'performance_evaluations';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->schemaTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('self_comment')->nullable();
            $table->string('supervisor_comment')->nullable();
            $table->string('manager_comment')->nullable();
            $table->string('business_unit_comment')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('last_edited_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->schemaTable);
    }
}
