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
        Schema::create('feature_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->string('icon')->nullable();
            $table->integer('organization');
            $table->integer('created_by');  
            $table->integer('updated_by');
            $table->enum('status', ['0', '1','2'])->default('1');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_services');
    }
};
