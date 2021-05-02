<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id', false, true, 5)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('estate_type', 255)->nullable();
            $table->string('min_value', 255)->nullable();
            $table->string('max_value', 255)->nullable();
            $table->string('min_surface', 255)->nullable();
            $table->string('max_surface', 255)->nullable();
            $table->string('min_rooms', 255)->nullable();
            $table->string('max_rooms', 255)->nullable();
            $table->enum('furnished', ['yes', 'no'])->default('no');
            $table->enum('elevator', ['yes', 'no'])->default('no');
            $table->enum('garage', ['yes', 'no'])->default('no');
            $table->enum('terraces', ['yes', 'no'])->default('no');
            $table->enum('courtyard', ['yes', 'no'])->default('no');
            $table->enum('heating', ['yes', 'no'])->default('no');
            $table->enum('air_conditioning', ['yes', 'no'])->default('no');
            $table->enum('garden', ['yes', 'no'])->default('no');
            $table->enum('pool', ['yes', 'no'])->default('no');
            $table->string('situation', 255)->nullable();
            $table->string('conservation_state', 255)->nullable();
            $table->enum('need_loan', ['yes', 'no'])->default('no');
            $table->text('observations')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
