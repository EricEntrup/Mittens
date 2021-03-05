<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSettingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'app_setting';

    /**
     * Run the migrations.
     * @table app_setting
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('site_name')->nullable()->default(null);
            $table->string('site_email')->nullable()->default(null);
            $table->string('site_logo')->nullable()->default(null);
            $table->string('site_favicon')->nullable()->default(null);
            $table->longText('site_description')->nullable()->default(null);
            $table->string('google_map_api')->nullable()->default(null);
            $table->longText('site_header_code')->nullable()->default(null);
            $table->longText('site_footer_code')->nullable()->default(null);
            $table->string('site_copyright')->nullable()->default(null);
            $table->string('contact_title')->nullable()->default(null);
            $table->string('contact_address')->nullable()->default(null);
            $table->string('contact_email')->nullable()->default(null);
            $table->string('contact_number')->nullable()->default(null);
            $table->string('facebook_url')->nullable()->default(null);
            $table->string('instagram_url')->nullable()->default(null);
            $table->string('twitter_url')->nullable()->default(null);
            $table->string('gplus_url')->nullable()->default(null);
            $table->string('linkedin_url')->nullable()->default(null);
            $table->string('slider_title')->nullable()->default(null);
            $table->string('slider_image')->nullable()->default(null);
            $table->string('slider_status')->nullable()->default(null);
            $table->string('remember_token')->nullable()->default(null);
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
