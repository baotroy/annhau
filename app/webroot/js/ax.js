function getAXCat(url, cat){
	$.post(url, {category: cat}, function(data){
		json =  jQuery.parseJSON(data);
		if(json.code == 0){
			if(json.result.length>0){
				opts = '';
				jQuery.each(json.result, function(key, data){
					opts += '<option value="'+data.id+'">'+data.name+'</option>';
				});
				$('.jxsubcat').html(opts);
			}
		}else{
			$('.jxsubcat').html('<option value="">Không có danh mục</option>');
		}
	});
}