<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->string('date');
            $table->string('contact');
            $table->string('patient');
            $table->foreign('patient')->references('id')->on('users');
            $table->text('notes');
            $table->bigInteger('offer_id')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->bigInteger('appointmet_id')->nullable();
            $table->foreign('appointmet_id')->references('id')->on('available_appointments');
            $table->bigInteger('user_id');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
