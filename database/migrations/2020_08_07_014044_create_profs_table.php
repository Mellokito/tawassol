<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nom_prof',100);
            $table->string('prenom_prof',100);
            $table->text('adresse_prof');
            $table->string('telephone_prof');
            $table->string('email_prof');
            $table->date('date_naissance_prof');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('profs');
    }
}
