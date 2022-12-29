<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->foreign('id')->references('id')->on('items')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('name');
            $table->integer('length');
            $table->foreignId('album_id')
                ->nullable()
                ->references('id')->on('albums')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->primary('id');
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
        Schema::dropIfExists('tracks');
    }
};
