<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProfilSeeder::class);
        $this->call(CategorieNiveauScolaireSeeder::class);
        $this->call(DregeParenteSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ProfSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GenreSeeder::class);
    }
}
