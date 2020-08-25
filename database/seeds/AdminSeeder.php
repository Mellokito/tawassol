<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'nom_admin' => Str::random(10),
            'prenom_admin' => Str::random(10),
            'username' => 'admin',
            'profil_id' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
