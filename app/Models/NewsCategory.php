<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsCategory extends Model
{
    public static function check_category($data, $category_id, $created_by)
    {
        $news_categories = DB::table('news_categories')
            ->where('status', '=', '1')
            ->where('category_name', '=', $data['category_name'])
            ->where('id', '!=', $category_id)
            ->where('created_by', '=', $created_by)
            ->first();
        return $news_categories;
    }
}
