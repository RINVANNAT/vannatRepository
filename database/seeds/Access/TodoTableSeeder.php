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

        DB::table('todo')->insert([
             'title'             => 'Finish home work',
            'description'      => 'algorithm homework',
            'deadline'          => '12 June 2016',
            'is_done'           => null,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ], [
            'title'             => 'Gym',
            'description'      => 'walk 20mn',
            'deadline'          => null,
            'is_done'           => null,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);



    }
}