<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('thumbImage'))
{
    /**
     * Get Thumbnail image path
     *
     * @param $path
     * @return bool|string
     */
    function thumbImage($path)
    {
        if(!$path){
            return false;
        }

        if(!file_exists($path)){
            return $path;
        }

        $path_info = pathinfo($path);

        $thumb_path = $path_info['dirname'] .'/' .$path_info['filename'] .'_thumb.'. $path_info['extension'];
        //If thubnail Not found.
        if(!file_exists($thumb_path)){
            return $path;
        }

        return $thumb_path;

    }
}

if ( ! function_exists('upload_path'))
{
	function upload_path($path=null){


		return base_url('uploads/'.$path);
	}
}

if ( ! function_exists('product_cover'))
{
	function product_cover($product){
		return base_url('/uploads');
	}
}
