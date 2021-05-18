<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id', false, true, 5)->nullable();
            $table->boolean('status')->default(false);
            $table->enum('published', ['yes', 'no'])->default('no');
            $table->string('value', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('interest_type', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('surface', 255)->nullable();
            $table->string('built_surface', 255)->nullable();
            $table->string('rooms', 255)->nullable();
            $table->string('baths', 255)->nullable();
            $table->enum('wardrobe', ['yes', 'no'])->default('no');
            $table->string('lobbies', 255)->nullable();
            $table->string('lobbies_surface', 255)->nullable();
            $table->enum('furnished', ['yes', 'no'])->default('no');
            $table->enum('separate_dining_room', ['yes', 'no'])->default('no');
            $table->string('dining_room_surface', 255)->nullable();
            $table->enum('furnished_kitchen', ['yes', 'no'])->default('no');
            $table->string('kitchen_type', 255)->nullable();
            $table->string('terraces', 255)->nullable();
            $table->string('terraces_surface', 255)->nullable();
            $table->enum('balcony', ['yes', 'no'])->default('no');
            $table->string('balcony_surface', 255)->nullable();
            $table->enum('courtyard', ['yes', 'no'])->default('no');
            $table->string('courtyard_surface', 255)->nullable();
            $table->string('courtyard_location', 255)->nullable();
            $table->string('situation', 255)->nullable();
            $table->string('ceiling_height', 255)->nullable();
            $table->enum('garage', ['yes', 'no'])->default('no');
            $table->string('garage_surface', 255)->nullable();
            $table->enum('storage_room', ['yes', 'no'])->default('no');
            $table->string('storage_room_surface', 255)->nullable();
            $table->enum('basement', ['yes', 'no'])->default('no');
            $table->string('basement_surface', 255)->nullable();
            $table->enum('heating', ['yes', 'no'])->default('no');
            $table->string('heating_type', 255)->nullable();
            $table->enum('air_conditioning', ['yes', 'no'])->default('no');
            $table->string('air_conditioning_type', 255)->nullable();
            $table->string('building_type', 255)->nullable();
            $table->string('floors', 255)->nullable();
            $table->string('floor', 255)->nullable();
            $table->enum('pool', ['yes', 'no'])->default('no');
            $table->enum('elevator', ['yes', 'no'])->default('no');
            $table->enum('urbanization', ['yes', 'no'])->default('no');
            $table->enum('garden', ['yes', 'no'])->default('no');
            $table->string('garden_surface', 255)->nullable();
            $table->date('building_date')->nullable();
            $table->string('conservation_state', 255)->nullable();
            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('google_maps', 255)->nullable();
            $table->text('estate_image')->nullable();
            $table->text('estate_image_web')->nullable();
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
        Schema::dropIfExists('estates');
    }
}
