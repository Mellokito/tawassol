<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profils')->insert([
            'nom_profil' => 'Administrateur',
        ]);
        DB::table('profils')->insert([
            'nom_profil' => 'Gestionnaire',
        ]);
    }
}
