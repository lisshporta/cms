<?php

use App\Models\Make;
use App\Models\Model;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Make::class);
            $table->foreignIdFor(Model::class);
            $table->string('body_type')->default('Sedan');
            $table->year('year');
            $table->decimal('price', 11, 2)->default(0);
            $table->string('color');
            $table->string('engine')->default('Automatic');
            $table->string('fuel_type')->default('Petrol');
            $table->integer('mileage')->default(0);
            $table->string('slug');
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
        Schema::dropIfExists('vehicles');
    }
};
