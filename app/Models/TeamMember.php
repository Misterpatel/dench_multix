<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = [];
    protected $table="team_members";
    protected $fillable=[
        'name',
        'phone',
        'email',
        'website',
        'designation',
        'photo',
        'detail',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'google_plus',
        'instagram',
        'flickr',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'organization',
        'created_by',
        'updated_by',
        'status'
    ];
}
