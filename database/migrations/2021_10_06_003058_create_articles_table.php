<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('body');
            $table->foreignId('user_id')->constrained();
            $table->timestamp('published_at')->nullable();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('parent')->nullable()->constrained('articles');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
