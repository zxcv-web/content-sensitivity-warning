// Cultural Sensitivity Warning

// Note: the cookie is controlled by both JS and PHP to allow for a Js being disabled.

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
		cookieControl.createCookie(name,"",-1);
	}
}

// iife to run function immediately without creating global variables.
document.addEventListener("DOMContentLoaded", function(event) {
		var csw = cookieControl.readCookie('csw');
		var sText = document.getElementById("csw-secondary-text");
		var button = document.getElementById("csw-warning-button");
		var link = document.getElementById("csw-warning-link");
		var cswCont = document.getElementById("csw-container");
		var style = document.getElementById("csw-container").getAttribute("data-style");
		var wrapper = document.getElementsByClassName("csw-wrapper");

		setTimeout(function(){
			// if ja is enabled, show secondary text and button, hide link and change css class
			sText.style.display = 'block';
			button.style = 'display:block !important';
			link.style.display = 'none';
			cswCont.className = 'csw-container-js';
			// if style is bootstrap and js is enabled, add bs modal-content class
			if (style === "bootstrap"){
				wrapper[0].className += ' modal-content';
			} else {};
		}, 1000);

		// if cookie is present hide csw. Php should take care of this before page load
		if (csw === 'yes') {
			cswCont.style.display = 'none';
		// button click event to write cookie with js
		} else {
			button.onclick = function() {
				cookieControl.createCookie('csw', 'yes', 7);
				cswCont.style.display = 'none';
			};
		}
});
