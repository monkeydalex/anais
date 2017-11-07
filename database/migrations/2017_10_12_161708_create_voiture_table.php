<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voiture', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_voiture');
            $table->timestamps();
            $table->string('type', 100)->index('type');
            $table->string('modele', 100);
            $table->string('marque', 100);
            $table->text('description');
            $table->double('prix', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voiture');
    }
}
