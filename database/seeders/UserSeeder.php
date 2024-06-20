<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        User::factory()->create( [
            'name' => 'Ahmed Atef',
            'email' => 'ahmed@gmail.com',
            'phone'=>'01026556692',
            'password' => bcrypt( '123456' ),
        ] );

        User::factory( 49 )->create();
    }
}