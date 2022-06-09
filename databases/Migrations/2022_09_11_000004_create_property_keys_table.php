<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_keys', function (Blueprint $table) {
            $table->id();
            $table->string('responsible');
            $table->string('code');
            $table->boolean('for_loan');
            $table->string('nome');
            $table->string('phone');
            $table->text('observation');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_keys');
    }
}
