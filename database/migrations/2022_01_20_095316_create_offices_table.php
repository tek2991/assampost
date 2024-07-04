<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->longText('other_description')->nullable();
            $table->softDeletes();
            $table->boolean('is_active')->default(true)->nullable();
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
        Schema::dropIfExists('offices');
    }
}
