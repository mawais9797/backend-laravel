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
        Schema::create('services_data', function (Blueprint $table) {
            $table->id();
            $table->integer('mem_id')->unsigned();
            $table->integer('parent_cat_id')->unsigned();
            $table->integer('sub_cat_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_data');
    }
};
