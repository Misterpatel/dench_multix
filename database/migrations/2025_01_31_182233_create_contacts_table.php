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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->tinyText('contact_heading');
            $table->text('contact_address');
            $table->text('contact_email');
            $table->text('contact_phone');
            $table->text('contact_map');
            $table->tinyText('mt_contact');
            $table->text('mk_contact');
            $table->text('md_contact');
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
        Schema::dropIfExists('contacts');
    }
};
