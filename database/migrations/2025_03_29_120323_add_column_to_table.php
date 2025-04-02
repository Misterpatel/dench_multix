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
        Schema::table('defalut_home_pages', function (Blueprint $table) {
            $table->tinyText('page_name')->nullable()->after('photo');
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('defalut_home_pages', function (Blueprint $table) {
            $table->dropColumn('page_name'); 
        });
    }
};
