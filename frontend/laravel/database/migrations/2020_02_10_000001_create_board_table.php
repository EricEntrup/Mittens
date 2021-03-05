<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'board';

    /**
     * Run the migrations.
     * @table board
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('title')->nullable()->default(null);
            $table->string('color', 100)->nullable()->default(null);
            $table->unsignedTinyInteger('status')->nullable()->default(null);
            $table->unsignedTinyInteger('sequence')->nullable()->default(null);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
