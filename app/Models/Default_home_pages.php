<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{User};

class Default_home_pages extends Model
{
    protected $guarded = [];
    protected $table="defalut_home_pages";
    protected $fillable=[
        'photo',
        'organization',
        'created_by',
        'updated_by',
        'status',
        'defalut_page'
    ];
	
	public function users()
	{
		return $this->hasOne(User::class, 'id', 'created_by');
	}
}
