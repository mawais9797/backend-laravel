<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         // Change the column to ENUM type
        Schema::table('members', function (Blueprint $table) {
            DB::statement("ALTER TABLE tbl_members MODIFY mem_type ENUM('buyer', 'professional', 'admin') NOT NULL DEFAULT 'buyer'");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Optionally revert it back to a string (or whatever it was before)
        Schema::table('members', function (Blueprint $table) {
            DB::statement("ALTER TABLE tbl_members MODIFY mem_type VARCHAR(255) NULL");
        });
    }
};
