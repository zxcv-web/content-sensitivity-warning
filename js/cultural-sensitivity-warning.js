// Cultural Sensitivity Warning

// All cookie-related functions live within the cookieControl object
var cookieControl = {
	createCookie : function(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	},

	readCookie : function(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	},

	eraseCookie : function(name) {
		createCookie(name,"",-1);
	}
}

// iife to run function immediately without creating global variables.
(function(){
	var warned = cookieControl.readCookie('warned');
	var sText = document.getElementById("csw-secondary-text");
	var button = document.getElementById("csw-warning-button");
	var csw = document.getElementById("csw-container");

	sText.style.display = 'block';
	button.style.display = 'block';
	csw.className = 'csw-container-js';

	if (warned === 'yes') {
		csw.style.display = 'none';
	} else {
		button.onclick = function() {
			cookieControl.createCookie('warned', 'yes', 7);
			csw.style.display = 'none';
		};
	}
})();
