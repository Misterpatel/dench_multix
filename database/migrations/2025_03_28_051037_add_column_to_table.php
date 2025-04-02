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
            $table->tinyText('home_our_partner_title')->nullable()->after('home_blog_status');
            $table->tinyText('home_our_partner_subtitle')->nullable()->after('home_our_partner_title');
            $table->tinyText('home_our_partner_status')->nullable()->after('home_our_partner_subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('home_our_partner_title'); 
            $table->dropColumn('home_our_partner_subtitle');
            $table->dropColumn('home_our_partner_status');
        });
    }
};
