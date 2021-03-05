<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('contact_number')->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->string('user_type')->default('user');
            $table->string('gender')->nullable()->default(null);
            $table->string('provider', 255)->nullable();            
            $table->string('provider_unique_id', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->rememberToken();

            $table->unique(["email"], 'users_email_unique');
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
