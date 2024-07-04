<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id()->startingValue(100001); // Start id from 100001
            $table->foreignId('time_slot_id')->constrained();
            $table->foreignId('counter_service_id')->constrained();
            $table->date('date');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('message');
            $table->string('status')->default('pending');
            $table->foreignId('user_id')->nullable()->constrained();
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
        Schema::dropIfExists('appointments');
    }
}
