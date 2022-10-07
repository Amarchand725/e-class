<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("role_id"); 
            $table->bigInteger("country_id")->nullable(); 
            $table->bigInteger("state_id")->nullable(); 
            $table->bigInteger("city_id")->nullable(); 
            $table->bigInteger("user_id"); 
            $table->string("first_name")->nullable(); 
            $table->string("last_name")->nullable(); 
            $table->string("mobile")->nullable(); 
            $table->string("email"); 
            $table->string("password"); 
            $table->string("address")->nullable(); 
            $table->string("profile_image")->nullable(); 
            $table->string("resume")->nullable(); 
            $table->text("facebook_url")->nullable(); 
            $table->text("twitter_url")->nullable(); 
            $table->text("youtube_url")->nullable(); 
            $table->text("linked_in_url")->nullable(); 
            $table->text("details")->nullable();
            $table->boolean('status')->default(1);
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('userprofiles');
    }
}
