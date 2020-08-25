<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseNiveauCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_niveau_cycles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('classe_id')->constrained('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cycle_scolaire_id')->constrained('cycle_scolaires')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('niveau_scolaire_id')->constrained('niveau_scolaires')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('admin_id')->constrained('admins');

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
        Schema::dropIfExists('classe_niveau_cycles');
    }
}
