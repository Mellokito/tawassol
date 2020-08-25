<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profs')->insert([
            'nom_prof' => Str::random(10),
            'prenom_prof' => Str::random(10),
            'adresse_prof' => Str::random(30),
            'telephone_prof' => Str::random(10),
            'email_prof' => Str::random(5).'@gmail.com',
            'date_naissance_prof' => '1980-10-11',
            'username' => 'prof',
            'password' => Hash::make('password'),
            'admin_id' => 1,
        ]);
    }
}
