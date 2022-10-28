<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('course_slug');
            $table->bigInteger('course_chapter');
            $table->bigInteger('chapter_class');
            $table->string('meeting_from')->default('zoom')->comment('zoom, google etc.');
            $table->text('meeting_url');
            $table->string('host_slug');
            $table->string('email');
            $table->date('start_date');
            $table->time('start_time');
            $table->string('topic');
            $table->string('slug');
            $table->text('agenda')->nullable();
            $table->string('thumbnail');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('meetings');
    }
}
