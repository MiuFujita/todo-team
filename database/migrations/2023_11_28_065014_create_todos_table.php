<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('user_id');
            $table->string('image')->nullable(); //画像ファイル保存用カラム
            $table->timestamps();
            $table->boolean('share')->default(false); // 'share' カラムを boolean 型で作成
            $table->string('day')->nullable(); // 'day' カラムを date 型で作成、nullable() は NULL 値を許可するため
        
        });
        // マイグレーションファイルの修正
        Schema::table('todos', function (Blueprint $table) {
            $table->string('day')->change();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
