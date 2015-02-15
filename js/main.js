$('#preview').on('click',function(){
	adurl=$('#adurl').val();
	$('#preview-field').show();
	$('#advertise-frame').attr('src',adurl)
});

$('#stoppreview').on('click',function(){
	$('#preview-field').hide();
});

$('#sample-advertise').bind('click', function(event) { 
	alert("iframe clicked");
});

document.getElementById("sample-advertise").contentWindow.document.body.onclick = 
function() {
  alert("iframe clicked");
}


