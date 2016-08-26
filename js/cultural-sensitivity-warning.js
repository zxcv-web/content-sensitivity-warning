// Cultural Sensitivity Warning


function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

$( document ).ready(function() {
	var warned = readCookie('warned');

	$('#warning-button').show();
	$('.tr-cookie-desc').show();

	if (warned === 'yes') {
		$('#tr-content-warning').hide();
	} else {
		$('#tr-content-warning').addClass('tr-content-warning-background-js').removeClass('tr-content-warning-background');
		$('#warning-button').on('click', function() {
			createCookie('warned', 'yes', 7);
			$('#tr-content-warning').hide();
		});
	}
});
