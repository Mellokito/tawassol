<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nom_parent' => Str::random(10),
            'prenom_parent' => Str::random(10),
            'adresse_parent' => Str::random(30),
            'telephone_parent' => Str::random(10),
            'email_parent' => Str::random(5).'@gmail.com',
            'date_naissance_parent' => '1975-03-05',
            'degre_parente_id' => 1,
            'username' => 'parent',
            'password' => Hash::make('password'),
            'admin_id' => 1,
        ]);
    }
}
