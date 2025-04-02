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
            $table->string('home_bannerInformation_title')->after('home_cta_button_url');
            $table->string('home_bannerInformation_heading')->after('home_bannerInformation_title');
            $table->text('home_bannerInformation_description')->nullable()->after('home_bannerInformation_heading');
            $table->string('home_bannerInformation_status')->default('show')->after('home_bannerInformation_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn(['home_bannerInformation_title', 'home_bannerInformation_heading', 'home_bannerInformation_description','home_bannerInformation_status']); 
        });
    }
};
