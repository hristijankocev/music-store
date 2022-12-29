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
        Schema::create('track_artists', function (Blueprint $table) {
            $table->bigInteger('track_id');
            $table->bigInteger('artist_id');

            $table->foreign('track_id')
                ->references('id')->on('tracks');
            $table->foreign('artist_id')
                ->references('id')->on('artists');

            $table->primary(['track_id', 'artist_id']);

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
        Schema::dropIfExists('track_artists');
    }
};
