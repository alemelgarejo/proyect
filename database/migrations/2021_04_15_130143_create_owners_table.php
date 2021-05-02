<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 25)->nullable();
            $table->string('last_name', 25)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('dni', 25)->nullable();
            $table->string('email', 50)->unique();
            $table->string('phone', 50)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('city', 50)->nullable();
            $table->date('birthdate', 50)->nullable();
            $table->text('observations')->nullable();
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('owners');
    }
}
