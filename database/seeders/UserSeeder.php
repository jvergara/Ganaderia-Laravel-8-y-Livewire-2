<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Boris',
            'email' => 'jvergara@ideaschile.cl',
            'password' => bcrypt('9900')
        ])->assignRole(['Admin']);
        User::factory(4)->create();
    }
}
