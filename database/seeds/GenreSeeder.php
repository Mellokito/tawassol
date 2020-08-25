<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'nom_genre' => 'Masculin',
        ]);
        DB::table('genres')->insert([
            'nom_genre' => 'Féminin',
        ]);
    }
}
