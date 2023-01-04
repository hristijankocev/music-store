<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::statement(
        /** @lang SQL */ "
        create view vw_track_details as
        select t1.id as track_id,
        track_artists.artists,
        t1.name as name,
        t1.length * interval '1 sec' as length,
        a2.name as album,
        track_genres.genres
            from tracks as t1
                join (select t1.id,
                    track_artists.artists as artists
                    from tracks t1
                        left join (select track_id, tracks.name, string_agg(a.name, ', ') as artists
                           from tracks
                           join track_artists ta on tracks.id = ta.track_id
                           join artists a on ta.artist_id = a.id
                           group by 1, 2) as track_artists
                           on t1.id = track_artists.track_id) as track_artists
                on t1.id = track_artists.id
                left join (select t1.id,
                    track_genres.genres as genres
                    from tracks t1
                        join (select t.id, t.name, string_agg(g.name, ', ') as genres
                            from tracks as t
                                join track_genres tg on t.id = tg.track_id
                                join genres g on tg.genre_id = g.id
                                group by 1, 2) as track_genres
                             on t1.id = track_genres.id) as track_genres
                on t1.id = track_genres.id
                left join albums a2 on t1.album_id = a2.id
        order by t1.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::statement('DROP VIEW vw_track_details');
    }
};
