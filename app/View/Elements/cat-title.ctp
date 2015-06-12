<div class="title"><h4><?php
$item_text = Message::label('item');

$lang = CakeSession::read('lang');
if($lang == 'en'){
    if($count > 1){
        $item_text .= 's';
    }
}
if(!isset($search_page)){
 echo $cat_title.' ('.$count.' '.$item_text.')';
}
else{
	echo Message::label('result_for').' "'.$cat_title.'" ('.$count.' '.$item_text.')';
}
  ?></h4></div>

