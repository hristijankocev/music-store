<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
        /** @lang SQL */ "
            create view vw_order_details as
            select u.id                             as user_id,
                   u.name                           as user_name,
                   u.username                       as user_username,
                   c.date_birth                     as user_date_birth,
                   c.delivery_address               as user_delivery_address,
                   string_agg(pn.phone_number, ',') as user_phone_numbers,
                   o.id                             as order_id,
                   round(o.total::numeric, 2)       as order_total
            from users as u
                join customers as c on c.user_id = u.id
                inner join orders as o on o.customer_id = c.id
                left join phone_numbers as pn on pn.customer_id = c.id
            group by u.id, c.date_birth, c.delivery_address, o.id
        ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW vw_order_details');
    }
};
