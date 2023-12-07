<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todo_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
    
            // 新しい一意性制約を追加
            $table->unique(['todo_id', 'user_id']);
    
            // 外部キー制約
            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adds');
    }
}
