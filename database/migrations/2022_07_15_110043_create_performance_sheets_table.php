<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('key_result_area');
            $table->string('key_performance_indicator');
            $table->integer('weight');
            $table->integer('self_score')->nullable();
            $table->integer('supervisor_score')->nullable();
            $table->integer('manager_score')->nullable();
            $table->integer('business_unit_score')->nullable();
            $table->integer('total_score')->nullable();
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
        Schema::dropIfExists('performance_sheets');
    }
}
