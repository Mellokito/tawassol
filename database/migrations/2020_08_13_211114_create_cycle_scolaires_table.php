<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCycleScolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycle_scolaires', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
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
        Schema::dropIfExists('cycle_scolaires');
    }
}
