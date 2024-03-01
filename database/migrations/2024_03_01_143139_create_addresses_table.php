<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('zip_code')->nullable(); //Cep
            $table->string('state');
            $table->string('city');
            $table->string('street')->nullable(); //Rua
            $table->string('neighborhood')->nullable(); //Bairro
            $table->integer('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('lat')->nullable(); // Latitude
            $table->string('lon')->nullable(); // Longitude
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
