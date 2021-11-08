<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'address' => 'Phnom Penh',
            'password' => bcrypt(123)
        ]);

        DB::table('roles')->insert([
        [
            'name' => 'admin',
            'description' => 'តួនាទីនេះគឺមានសិទ្ធធំជាងគេគឺ (អាចចូលគ្រប់គ្រងAdmin និង អាចចូលមើលInterface Website)'
        ],[
            'name' => 'user',
            'description' => 'តួនាទីនេះគឺមានសិទ្ធតូចជាងគេគឺបានត្រឹមតែ (ចូលមើលInterface Website តែប៉ុណ្ណោះ)'
        ]
        ]);
    }
}
