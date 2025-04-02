<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    protected $table="menus";
    protected $fillable=[
        'module_id',
        'parent_id',
        'name',
        'icon',
        'link',
        'order_by',
        'organization',
        'created_by',
        'updated_by',
        'status'
    ];
	
	public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
}
 