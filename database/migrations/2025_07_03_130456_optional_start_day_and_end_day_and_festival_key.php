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
        Schema::table('about_us', function (Blueprint $table) {
            // Make start_day and end_day nullable
            $table->string('start_day')->nullable()->change();
            $table->string('end_day')->nullable()->change();

            // Add new column is_festival
            $table->boolean('is_festival')->default(false)->after('end_day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            // Revert start_day and end_day to NOT NULL
            $table->string('start_day')->nullable(false)->change();
            $table->string('end_day')->nullable(false)->change();

            // Drop is_festival column
            $table->dropColumn('is_festival');
        });
    }
};
