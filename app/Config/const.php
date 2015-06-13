<?php
define('site_name', "Ryta Decor' Accessories");
define('fb_app', "");

define('NO_ITEMS', 'No items');
define('LIMIT', 3);
define('LIMIT_BEST', 4);
define('ITEM', 'Items');
define('FS', '/');
define('NO_IMAGE','no_image.png');
define('DEFAULT_LANG', 'vi');
//DIR
define('DIR_IMAGE', 'images/');
define('DIR_PRODUCT', 'products/');
define('DIR_SMALL', 'small/');//width: 320
define('DIR_CATEGORY', 'categories/');
define('DIR_BANNER', 'banners/');
define('DIR_UPLOAD', 'uploads/');

define('LOGO', DIR_IMAGE.'logog.png');

define('ADMIN_LIMIT', 5);
class Constants
{
	public static $langs = array('en'=> 'English', 'vi' => 'Tiếng Việt');

	public static $dic_en = array(
		'mnu_home' => 'HOME',
		'mnu_products' => 'PRODUCTS',
		'mnu_contact' => 'CONTACT',
		'mnu_about' => 'ABOUT',

		'categories' => 'CATEGORIES',
		'best_products' => 'BEST PRODUCTS',
		'new_products' => 'NEW PRODUCTS',
		'services' => 'OUR SERVICES',
		'testimonial' => 'TESTIMONIAL',
		'contact_us' => 'CONTACT US',
		'map_guide' => 'MAP GUIDE',
		'contact_info' => 'CONTACT INFO',
		'no_items' => 'No items',
		'zoom' =>'ZOOM',

		'thank_comment' => 'Thank you for comment!',
		'tab_details' => 'DETAILS',
		'tab_reviews' => 'REVIEWS',
		'category' => 'Category',
		'write_review' => 'Write Your Review',
		'your_name' => 'Your Name',
		'item' => 'item',
		'result_for' => 'Results for ',
		'address' => 'Address',
		'tel' => 'Telephone',
		'name' => 'Name',
		'message' => 'Content',
		'submit' => 'Submit',
		'title_contact' => 'Contact us',
		'title_about'=> 'About',
		'thank_contact' => 'Your contact has been sent successfully!',
		'you_left' => 'You left ',
		'character' => ' character',
		'oops' => 'Oops!',
		'404' => '404 Not Found',
		'404_message' => 'Sorry, an error has occured, Requested page not found!',
		'take_home' => 'Take Me Home'
		
	);

	public static $dic_vi = array(
		'mnu_home' => 'TRANG CHỦ',
		'mnu_products' => 'SẢN PHẨM',
		'mnu_contact' => 'LIÊN HỆ',
		'mnu_about' => 'CHÚNG TÔI',

		'categories' => 'DANH MỤC',
		'best_products' => 'SẢN PHẨM YÊU THÍCH',
		'new_products' => 'SẢN PHẨM MỚI',
		'services' => 'DỊCH VỤ',
		'testimonial' => 'CẢM NGHĨ',
		'contact_us' => 'LIÊN HỆ',
		'map_guide' => 'BẢN ĐỒ',
		'contact_info' => 'THÔNG TIN LIÊN HỆ',
		'no_items' => 'Không có sản phẩm nào',
		'zoom' =>'PHÓNG TO',

		'thank_comment' => 'Cảm ơn bạn đã nhận xét!',
		'tab_details' => 'MÔ TẢ',
		'tab_reviews' => 'NHẬN XÉT',
		'category' => 'Danh mục',
		'write_review' => 'Nhận Xét',
		'your_name' => 'Tên của bạn',
		'item' => 'sản phẩm',
		'result_for' => 'Kết quả với ',
		'address' => 'Địa chỉ',
		'tel' => 'Điện thoại',
		'name' => 'Tên',
		'message' => 'Nội dung',
		'submit' => 'Gửi',
		'title_contact' => 'Liên Hệ',
		'title_about'=> 'Về Chúng Tôi',
		'thank_contact' => 'Liên hệ của bạn đã được gởi thành công!',
		'you_left' => 'Bạn còn ',
		'character' => ' ký tự',
		'oops' => 'Rất tiếc!',
		'404' => '404 Không tìm thấy trang',
		'404_message' => 'Rất tiếc, trang bạn yêu cầu không tồn tại!',
		'take_home' => 'Về Trang Chủ'
	);
}