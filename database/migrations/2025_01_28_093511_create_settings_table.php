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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyText('logo')->nullable();
            $table->tinyText('favicon')->nullable();
            $table->tinyText('footer_col1_title')->nullable();
            $table->tinyText('footer_col2_title')->nullable();
            $table->tinyText('footer_col3_title')->nullable();
            $table->tinyText('footer_col4_title')->nullable();
            $table->text('footer_copyright')->nullable();
            $table->text('footer_address')->nullable();
            $table->text('footer_email')->nullable();
            $table->text('footer_phone')->nullable();
            $table->tinyText('footer_recent_news_item')->nullable();
            $table->tinyText('footer_recent_portfolio_item')->nullable();
            $table->text('newsletter_text')->nullable();
            $table->text('cta_text')->nullable();
            $table->tinyText('cta_button_text')->nullable();
            $table->tinyText('cta_button_url')->nullable();
            $table->tinyText('cta_background')->nullable();
            $table->tinyText('top_bar_email')->nullable();
            $table->tinyText('top_bar_phone')->nullable();
            $table->tinyText('send_email_from')->nullable();
            $table->tinyText('receive_email_to')->nullable();
            $table->tinyText('banner_about')->nullable();
            $table->tinyText('banner_faq')->nullable();
            $table->tinyText('banner_service')->nullable();
            $table->tinyText('banner_testimonial')->nullable();
            $table->tinyText('banner_news')->nullable();
            $table->tinyText('banner_event')->nullable();
            $table->tinyText('banner_contact')->nullable();
            $table->tinyText('banner_search')->nullable();
            $table->tinyText('banner_terms')->nullable();
            $table->tinyText('banner_privacy')->nullable();
            $table->tinyText('banner_team')->nullable();
            $table->tinyText('banner_portfolio')->nullable();
            $table->tinyText('banner_verify_subscriber')->nullable();
            $table->tinyText('banner_pricing')->nullable();
            $table->tinyText('banner_photo_gallery')->nullable();
            $table->tinyText('front_end_color')->nullable();
            $table->tinyText('sidebar_total_recent_post')->nullable();
            $table->tinyText('sidebar_total_upcoming_event')->nullable();
            $table->tinyText('sidebar_total_past_event')->nullable();
            $table->tinyText('sidebar_news_heading_category')->nullable();
            $table->tinyText('sidebar_news_heading_recent_post')->nullable();
            $table->tinyText('sidebar_event_heading_upcoming')->nullable();
            $table->tinyText('sidebar_event_heading_past')->nullable();
            $table->tinyText('sidebar_service_heading_service')->nullable();
            $table->tinyText('sidebar_service_heading_quick_contact')->nullable();
            $table->tinyText('sidebar_portfolio_heading_project_detail')->nullable();
            $table->tinyText('sidebar_portfolio_heading_quick_contact')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
