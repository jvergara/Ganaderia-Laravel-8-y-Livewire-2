<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesPaypalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_paypals', function (Blueprint $table) {
            $table->id();

            $table->text('token');
            $table->string('orden', 128);
            $table->string('nombre', 64);
            $table->string('correo', 128);
            $table->string('id_captura', 128);
            $table->string('monto', 128);
            $table->string('country_code', 10);
            $table->string('paypal_request', 64);
            $table->unsignedBigInteger('estado')->default(1);
            $table->dateTime('fecha')->useCurrent();

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
        Schema::dropIfExists('ordenes_paypals');
    }
}
