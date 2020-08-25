<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_etudiants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('image');
            $table->string('etudiant_id');
            $table->foreignId('classe_niveau_cycle_id')->constrained('classe_niveau_cycles');
            $table->foreignId('admin_id')->constrained('admins');

            $table->timestamps();
        });

        Schema::table('fiche_etudiants', function (Blueprint $table) {
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiche_etudiants');
    }
}
