
$(function(){
$('.item img').click(function(){
	select = $(this).attr('src');
	$('.view-product img').attr('src', select);
});
$('.jszoom').click(function(){
	sib = $(this).prev();
	popitup(sib.attr('src'));
});

});

function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}