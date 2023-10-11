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
        Schema::create('about_components', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('about_id');
            $table->string('field_name');
            $table->string('field_value');
            $table->boolean('field_type')->default(false);
            $table->boolean('field_status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_components');
    }
};
