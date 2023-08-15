<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('localidade');
            $table->string('uf', 2);
            $table->string('complemento')->nullable();
            $table->string('numero_casa') -> nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
