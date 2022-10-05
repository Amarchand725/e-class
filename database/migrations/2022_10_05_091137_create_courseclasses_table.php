<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseclasses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("course_id"); 
            $table->bigInteger("chapter_id"); 
            $table->string("title"); 
            $table->text("detail")->nullable(); 
            $table->string("type"); 
            $table->string("attachment")->nullable(); 
            $table->boolean("is_featured");
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
        Schema::dropIfExists('courseclasses');
    }
}
