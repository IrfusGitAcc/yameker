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
        Schema::create('states', function (Blueprint $table) {
            $table->id('state_id');
            $table->bigInteger('country_id')->unsigned(); // The foreign key column

            // Define the foreign key constraint, referencing country_id in countries table
            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
            $table->string('state_code')->unique();
            $table->string('state_name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
