<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_slug"); 
            $table->string("course_ids"); 
            $table->string("title");
            $table->string("slug"); 
            $table->text("short_detail"); $table->text("details")->nullable(); $table->string("banner"); $table->boolean("is_paid"); $table->boolean("is_featured"); $table->date("start_from"); $table->date("end_date"); $table->string("retail_price")->nullable(); $table->string("price")->nullable();
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
        Schema::dropIfExists('bundles');
    }
}
