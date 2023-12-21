<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('email', 255);
            $table->longText('url')->nullable();
            $table->boolean('gender');
            $table->tinyInteger('age');
            $table->string('contact', 200);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('contact_forms')->onDelete('cascade');
    

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_forms');
    }
};
