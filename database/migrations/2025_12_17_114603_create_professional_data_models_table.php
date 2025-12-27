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
        Schema::create('professional_data', function (Blueprint $table) {
            $table->id();
            $table->integer('services_id')->unsigned()->nullable();
            $table->string('business_name', 255)->nullable();
            $table->text('business_address')->nullable();
            $table->string('business_type', 255)->nullable();
            $table->string('employees', 255)->nullable();
            $table->string('looking_for', 255)->nullable();
            $table->string('payment_gateway', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_data');
    }
};
