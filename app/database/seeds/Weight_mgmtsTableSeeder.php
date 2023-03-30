<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Weight_mgmtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weight_mgmts')->insert([
            'user_id' => 1,
            'weight' => 100,
            'goal' => '50',
            'goal' => '50',
            'period' => '2023-04-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
