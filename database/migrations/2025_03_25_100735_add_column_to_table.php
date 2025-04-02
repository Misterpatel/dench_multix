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
             $table->tinyText('home_storyAspire_status')->nullable()->after('home_feature_status');
			 $table->tinyText('home_storyAspire_heading')->nullable()->after('home_storyAspire_status');
             $table->tinyText('home_storyAspire_description')->nullable()->after('home_storyAspire_heading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
			$table->dropColumn('home_storyAspire_heading');
            $table->dropColumn('home_storyAspire_description'); 
            $table->dropColumn('home_storyAspire_status'); 
        });
    }
};
