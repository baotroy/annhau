<?php
define('NEW_PRODUCT', 'New Arrivals');
define('NO_ITEMS', 'No items');
define('LIMIT', 3);
define('ITEM', 'Items');
define('FS', '/');
define('NO_IMAGE','no_image.png');
define('DEFAULT_LANG', 'vi');
//DIR
define('DIR_IMAGE', 'images/');
define('DIR_PRODUCT', 'products/');
define('DIR_CATEGORY', 'categories/');
define('THANK_COMMENT', 'Thank you for comment!');
if (!class_exists('Constants')) {
	class Constants
	{
		static $langs = array('en'=> 'English', 'vi' => 'Tiếng Việt');
	}
}