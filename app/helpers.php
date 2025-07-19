<?php
use App\Models\RoleInfo;
use App\Models\Experience;
use App\Models\Product;
if (!function_exists('get_role_info')) {
    function get_role_info($id)
    {
        $role_info = RoleInfo::where('role_id',$id)->first();
        return $role_info;
    }
}

if (!function_exists('get_exp')) {
    function get_exp($ids)
    {
        if (!is_array($ids)) {
            $ids = explode(',', $ids);
        }

        $ids = array_map('intval', $ids);

        return Experience::whereIn('id', $ids)->pluck('title')->toArray();
    }
}

if (!function_exists('get_Product')) {
    function get_Product($ids)
    {
        if (!is_array($ids)) {
            $ids = explode(',', $ids);
        }

        $ids = array_map('intval', $ids);

        return Product::whereIn('id', $ids)->pluck('title')->toArray();
    }
}






