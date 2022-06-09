<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('property_types');
            $table->foreignId('user_id')->constrained('users');
            $table->string('code');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->json('options')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('property_property_finality', function (Blueprint $table) {
            $table->foreignId('finality_id')->constrained('property_finalities');
            $table->foreignId('property_id')->constrained('property_properties');
            $table->decimal('price', 8, 2)->nullable();
        });

        Schema::create('property_property_feature', function (Blueprint $table) {
            $table->foreignId('feature_id')->constrained('property_features');
            $table->foreignId('property_id')->constrained('property_properties');
            $table->integer('value')->nullable();
        });

        Schema::create('property_property_infrastructure', function (Blueprint $table) {
            $table->foreignId('infrastructure_id')->constrained('property_infrastructures');
            $table->foreignId('property_id')->constrained('property_properties');
        });

        Schema::create('property_property_people', function (Blueprint $table) {
            $table->foreignId('people_id')->constrained('property_people');
            $table->foreignId('property_id')->constrained('property_properties');
            $table->integer('percentage')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_property_people');
        Schema::dropIfExists('property_property_infrastructure');
        Schema::dropIfExists('property_property_feature');
        Schema::dropIfExists('property_property_finality');
        Schema::dropIfExists('property_properties');
    }
}
