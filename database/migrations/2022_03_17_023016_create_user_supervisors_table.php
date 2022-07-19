<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSupervisorsTable extends Migration
{
    protected $schemaTable = 'user_supervisors';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->schemaTable, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('supervisor_id')->nullable();
            $table->unsignedInteger('secondary_supervisor_id')->nullable();
            $table->timestamp('start_date')->nullable();  
            $table->timestamp('end_date')->nullable();
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
