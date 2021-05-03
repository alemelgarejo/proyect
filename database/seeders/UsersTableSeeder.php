<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Alejandro',
            'last_name' => 'Melgarejo Curbelo',
            'role_id' => 1,
            'dni' => '78588379R',
            'comertial' => 'A1S2D3',
            'email' => 'melgarejoale1@gmail.com',
            'phone' => '655664782',
            'description' => 'Inmodata developer. Higher Degree in Web Application Development since 2021.',
            'birthdate' => now(),
            'password' => Hash::make('Csas1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
