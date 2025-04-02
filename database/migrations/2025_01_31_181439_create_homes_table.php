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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->tinyText('title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyText('home_welcome_title')->nullable();
            $table->tinyText('home_welcome_subtitle')->nullable();
            $table->text('home_welcome_text')->nullable();
            $table->text('home_welcome_video')->nullable();
            
            for ($i = 1; $i <= 5; $i++) {
                $table->tinyText("home_welcome_pbar{$i}_text")->nullable();
                $table->tinyText("home_welcome_pbar{$i}_value")->nullable();
            }
        
            $table->tinyText('home_welcome_status')->nullable();
            $table->tinyText('home_welcome_video_bg')->nullable();
            $table->tinyText('home_why_choose_title')->nullable();
            $table->tinyText('home_why_choose_subtitle')->nullable();
            $table->tinyText('home_why_choose_status')->nullable();
            $table->tinyText('home_feature_title')->nullable();
            $table->tinyText('home_feature_subtitle')->nullable();
            $table->tinyText('home_feature_status')->nullable();
            $table->tinyText('home_service_title')->nullable();
            $table->tinyText('home_service_subtitle')->nullable();
            $table->tinyText('home_service_status')->nullable();
        
            for ($i = 1; $i <= 4; $i++) {
                $table->tinyText("counter_{$i}_title")->nullable();
                $table->tinyText("counter_{$i}_value")->nullable();
                $table->tinyText("counter_{$i}_icon")->nullable();
            }
        
            $table->tinyText('counter_photo')->nullable();
            $table->tinyText('counter_status')->nullable();
            $table->tinyText('home_portfolio_title')->nullable();
            $table->tinyText('home_portfolio_subtitle')->nullable();
            $table->tinyText('home_portfolio_status')->nullable();
            $table->tinyText('home_booking_form_title')->nullable();
            $table->tinyText('home_booking_faq_title')->nullable();
            $table->tinyText('home_booking_status')->nullable();
            $table->tinyText('home_booking_photo')->nullable();
            $table->tinyText('home_team_title')->nullable();
            $table->tinyText('home_team_subtitle')->nullable();
            $table->tinyText('home_team_status')->nullable();
            $table->tinyText('home_ptable_title')->nullable();
            $table->tinyText('home_ptable_subtitle')->nullable();
            $table->tinyText('home_ptable_status')->nullable();
            $table->tinyText('home_testimonial_title')->nullable();
            $table->tinyText('home_testimonial_subtitle')->nullable();
            $table->tinyText('home_testimonial_photo')->nullable();
            $table->tinyText('home_testimonial_status')->nullable();
            $table->tinyText('home_blog_title')->nullable();
            $table->tinyText('home_blog_subtitle')->nullable();
            $table->tinyText('home_blog_item')->nullable();
            $table->tinyText('home_blog_status')->nullable();
            $table->text('home_cta_text')->nullable();
            $table->tinyText('home_cta_button_text')->nullable();
            $table->tinyText('home_cta_button_url')->nullable();
            $table->integer('organization')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->enum('status', ['0', '1', '2'])->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
