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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tumblr')->nullable();
            $table->string('flickr')->nullable();
            $table->string('reddit')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('quora')->nullable();
            $table->string('stumbleupon')->nullable();
            $table->string('delicious')->nullable();
            $table->string('digg')->nullable();
            $table->integer('organization')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->enum('status', ['0', '1', '2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
