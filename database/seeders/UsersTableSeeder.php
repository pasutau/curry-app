<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //test user
        DB::table('users')->insert([
            'name' => 'test1',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('test1test1'),
            'create_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
