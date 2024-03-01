<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('cpf_cnpj');
            $table->string('fantasy_name')->nullable();
            $table->string('registration')->nullable();
            $table->string('municipal_registration')->nullable();
            $table->string('state_registration')->nullable(); 
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('address_id');                       
            $table->unsignedBigInteger('user_id');                       
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
        Schema::dropIfExists('profiles');
    }
}
