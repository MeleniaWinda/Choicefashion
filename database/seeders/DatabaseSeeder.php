<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => '$2y$10$q1XRGEsKBoYEoKTt21Sp4uSKBavhuy6u/dE2r7N5kDjBRu5mac1de',
            'created_at' => '2021-07-23 12:00:00',
            'updated_at' => '2021-07-23 12:00:00'
        ]);
    }
}
