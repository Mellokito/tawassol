<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle_matieres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nom_controle',100);
            $table->dateTime('date_controle');
            
            $table->foreignId('prof_id')->constrained('profs');
            $table->foreignId('classe_niveau_cycle_id')->constrained('classe_niveau_cycles');
            $table->foreignId('type_controle_id')->constrained('type_controles');

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
        Schema::dropIfExists('controle_matieres');
    }
}
