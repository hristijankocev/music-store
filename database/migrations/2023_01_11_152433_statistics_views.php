<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Statistics about how many times a track was sold, each year
        DB::statement(
        /** @lang PostgreSQL */ "
                   create view vw_stats_tracks_sold as
                   select t.name                            as track_name,
                          count(t.id)                       as times_sold,
                          extract('year' from o.created_at) as year
                   from order_item oi
                            join tracks t on oi.item_id = t.id
                            join orders o on oi.order_id = o.id
                   group by t.id, year
                   order by year, times_sold desc;"
        );

        // Statistics about average monthly revenue (all years)
        DB::statement(/** @lang PostgreSQL */ "
                    create view vw_stats_monthly_revenue as
                    select avg(total), extract('month' from created_at) as month
                    from orders
                    group by month
                    order by month;
        ");

        // Statistics about tracks per genre
        DB::statement(/** @lang PostgreSQL */ "
                    create view vw_stats_tracks_per_genre as
                    select g.name as genre, count(t.id)
                    from track_genres as tg
                        join genres g on tg.genre_id = g.id
                        join tracks t on tg.track_id = t.id
                    group by g.name
                    order by 2 desc;
        ");

        // Statistics about tracks released per year
        DB::statement(/** @lang PostgreSQL */ "
                    create view vw_stats_tracks_per_year as
                    select count(t.id)                       as released_songs,
                           extract('year' from t.created_at) as year
                    from tracks as t
                    group by year
                    order by 1 desc;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW vw_stats_tracks_sold');
        DB::statement('DROP VIEW vw_stats_monthly_revenue');
        DB::statement('DROP VIEW vw_stats_tracks_per_genre');
        DB::statement('DROP VIEW vw_stats_tracks_per_year');
    }
};
