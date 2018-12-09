<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('thumbImage')) {
	/**
	 * Get Thumbnail image path
	 *
	 * @param $path
	 * @return bool|string
	 */
	function thumbImage($path)
	{
		if (!$path) {
			return false;
		}

		if (!file_exists($path)) {
			return $path;
		}

		$path_info = pathinfo($path);

		$thumb_path = $path_info['dirname'] . '/' . $path_info['filename'] . '_thumb.' . $path_info['extension'];
		//If thumbnail Not found.
		if (!file_exists($thumb_path)) {
			return $path;
		}

		return $thumb_path;

	}
}

if (!function_exists('img_path')) {
	function img_path($path = null)
	{


		return base_url('images/' . $path);
	}
}

if (!function_exists('product_images')) {
	function product_images($file_name)
	{
		return base_url('/images/products/' . $file_name);
	}
}

if (!function_exists('product_images_path')) {
	function product_images_path($arg)
	{
		return 'images/products/'.$arg;
	}
}

if (!function_exists('slugify')){
	function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}
}
