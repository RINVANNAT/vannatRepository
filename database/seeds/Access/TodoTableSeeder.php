<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class TodoTableSeeder
 */
class TodoTableSeeder extends Seeder
{
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $todos = [
            [
                'title'             => 'Finish home work',
                'descriptioni'      => 'algorithm homework',
                'deadline'          => '12 June 2016',
                'is_done'           => null,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'title'             => 'Gym',
                'descriptioni'      => 'walk 20mn',
                'deadline'          => null,
                'is_done'           => null,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('todo'))->insert($todos);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}