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
        Schema::table('homes', function (Blueprint $table) {
            $table->tinyText('home_contactAbout_phone')->nullable()->after('home_welcome_video_bg');
            $table->tinyText('home_contactAbout_title')->nullable()->after('home_contactAbout_phone');
            $table->tinyText('home_contactAbout_subtitle')->nullable()->after('home_contactAbout_title');
            $table->tinyText('home_contactAbout_status')->nullable()->after('home_contactAbout_subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('home_contactAbout_phone'); 
            $table->dropColumn('home_contactAbout_title');
            $table->dropColumn('home_contactAbout_subtitle');
            $table->dropColumn('home_contactAbout_status');
        });
    }
};
