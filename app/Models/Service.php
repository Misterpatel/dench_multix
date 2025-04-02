<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    protected $table="services";
    protected $fillable=[
        'service_category_id',
        'heading',
        'photo',
        'service_content',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'meta_slug',
        'organization',
        'created_by',
        'updated_by',
        'status'
    ];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
}
