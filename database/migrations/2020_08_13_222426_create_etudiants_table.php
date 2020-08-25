<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            //code massar
            $table->string('id', 30)->primary();
            $table->string('nom_etudiant',100);
            $table->string('prenom_etudiant',100);
            $table->text('adresse_etudiant');
            $table->date('date_naissance_etudiant');
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('genre_id')->constrained('genres');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
