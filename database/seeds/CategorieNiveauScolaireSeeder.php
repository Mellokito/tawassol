<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieNiveauScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie_niveau_scolaires')->insert([
            'nom_categorie' => 'Préscolaire',
        ]);
        DB::table('categorie_niveau_scolaires')->insert([
            'nom_categorie' => 'Primaire',
        ]);
        DB::table('categorie_niveau_scolaires')->insert([
            'nom_categorie' => 'Collège',
        ]);
        DB::table('categorie_niveau_scolaires')->insert([
            'nom_categorie' => 'Secondaire',
        ]);
    }
}
