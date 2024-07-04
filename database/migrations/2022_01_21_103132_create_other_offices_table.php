<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_offices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('office_id')->unsigned();
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
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_offices');
    }
}
