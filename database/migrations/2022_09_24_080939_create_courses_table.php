<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("created_by");
            $table->string("title");
            $table->string("slug");
            $table->string("price")->nullable();
            $table->string("sale_price")->nullable();
            $table->string("short_description")->nullable();
            $table->text("requirements")->nullable();
            $table->text("full_description")->nullable();
            $table->boolean("is_featured")->nullable();
            $table->string("thumbnail");
            $table->string("video")->nullable();
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
        Schema::dropIfExists('courses');
    }
}
