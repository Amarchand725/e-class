<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollstudents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("created_by"); 
            $table->bigInteger("order_number"); 
            $table->string("instructor_slug");
            $table->string("user_slug");
            $table->string("product_type")->comment('course or bundle'); 
            $table->string("product_slug")->nullable();
            $table->date("enroll_start_date")->nullable();
            $table->date("enroll_end_date")->nullable();
            $table->boolean("is_completed")->defafult(0);
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
        Schema::dropIfExists('enrollstudents');
    }
}
