<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('topic_id');
            $table->text('response');
            $table->integer('count_likes')->nullable();
            $table->timestamps();

            // Relacionamento da chave id (answers), com chave id (users) e delete cascade
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

            // Relacionamento da chave id (answers), com chave id (topics) e delete cascade
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
