<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    protected $table="blogs";
    protected $fillable=[
        'blog_category_id',
        'heading',
        'photo',
        'blog_content',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'meta_slug',
        'organization',
        'created_by',
        'updated_by',
        'status' 
    ];

    public function blog_category()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }
}
