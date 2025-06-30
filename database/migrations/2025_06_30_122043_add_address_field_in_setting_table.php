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
            Schema::table('setting', function (Blueprint $table) {
                $table->text('address')->nullable()->after('yagna_image');
                $table->string('contact_number')->nullable()->after('address');
                $table->string('email')->nullable()->after('contact_number');
                $table->string('logo')->nullable()->after('email');
                $table->text('description')->nullable()->after('logo');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('setting', function (Blueprint $table) {
            $table->dropColumn(['address', 'contact_number', 'email','logo', 'description']);

        });
    }
};
