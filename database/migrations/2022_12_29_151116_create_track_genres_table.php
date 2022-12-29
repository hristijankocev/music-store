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
        Schema::create('track_genres', function (Blueprint $table) {
            $table->bigInteger('track_id');
            $table->bigInteger('genre_id');

            $table->foreign('track_id')
                ->references('id')
                ->on('tracks');
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres');

            $table->primary(['track_id', 'genre_id']);

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
        Schema::dropIfExists('track_genres');
    }
};
