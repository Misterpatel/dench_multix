<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $guarded = [];
    protected $table="photo_galleries";
    protected $fillable=[
        'photo',
        'organization',
        'created_by',
        'updated_by',
        'status'
    ];
}
