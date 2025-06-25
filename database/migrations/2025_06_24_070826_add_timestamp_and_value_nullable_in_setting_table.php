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
        Schema::table('setting', function (Blueprint $table) {
            $table->string('home_video_link')->nullable()->change();
            $table->string('mahapuja_image')->nullable()->change();
            $table->string('yagna_image')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting', function (Blueprint $table) {
            $table->string('home_video_link')->nullable(false)->change();
            $table->string('mahapuja_image')->nullable()->change();
            $table->string('yagna_image')->nullable()->change();
        });
    }
};
