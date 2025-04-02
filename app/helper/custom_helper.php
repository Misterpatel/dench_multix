<?php

if (!function_exists('getCountBlog')) {
    function getCountBlog($id)
    {
        return \App\Models\Blog::where("blog_category_id",$id)->count();
    }
}


if (!function_exists('getServiceCategoryName')) {
    function getServiceCategoryName($id)
    {
		$data= DB::table('service_categories')->where('id', $id)->first();
		return $data->name;
    }
}
?>