$('#preview').on('click',function(){
	adurl=$('#adurl').val();
	$('#preview-field').show();
	$('#advertise-frame').attr('src',adurl)
});

$('#stoppreview').on('click',function(){
	$('#preview-field').hide();
});


