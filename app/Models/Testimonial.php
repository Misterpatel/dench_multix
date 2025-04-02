<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = [];
    protected $table="testimonials";
    protected $fillable=[
        'name',
        'designation',
        'photo',
        'comment',
        'designation',
        'organization',
        'created_by',
        'updated_by',
        'status'
    ];
}
 