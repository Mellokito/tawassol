<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DregeParenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degre_parentes')->insert([
            'nom_degre_parente' => 'Père',
        ]);
        DB::table('degre_parentes')->insert([
            'nom_degre_parente' => 'Mère',
        ]);
        DB::table('degre_parentes')->insert([
            'nom_degre_parente' => 'Autre',
        ]);
    }
}
