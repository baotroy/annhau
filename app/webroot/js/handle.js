
$(function(){
$(document).on('click', '.item img', function(){
	select = $(this).attr('src');
	ref =  $(this).attr('ref');
	$('.view-product img').attr('src', select).attr('ref', ref);
});
$(document).on('click', '.jszoom', function(){
	sib = $(this).prev();
	popitup(sib.attr('ref'));
});

});
function rating(url, product, mark){
	$.post(url, {id: product, rate: mark}, function(data){
		$('#rate-text').text(data);
	});
}
function postComment(url, out){
	$.post( url, $( "#form-comment" ).serialize(), function(data){
		json =$.parseJSON(data);
		if(json['code']==1){
			$('.error').removeClass('error');
			$.each(json['error'],function(index,data)
			{
				putError(data);
			});
		}else{
			$('#comment-box').animate({
			    opacity: 0,				    
			  }, 400, function() {
			    $(this).html('<b>'+out+'</b>').animate({
			    	opacity: 1
			    }, 400);
			  });
			html = '<ul class="newreview" style="opacity: 0"><li><i class="fa fa-user"></i>'+json.rec.commentator+'</li><li><i class="fa fa-clock-o"></i>'+json.rec.created_time+'</li><li><i class="fa fa-calendar-o"></i>'+json.rec.created_date+'</li></ul><p  class="newreview" style="opacity: 0">'+json.rec.content+'</p>';
			$('#reviews div').prepend(html);
			$('.newreview').animate({
				opacity: 1
			}, 400);
		}
	});
}
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}

function putError(cn){
	$('.jx'+cn).addClass('error');
}