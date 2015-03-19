var ci_profiler_bar = {

	// current toolbar section thats open
	current: null,

	// current vars and config section open
	currentvar: null,

	// current config section open
	currentli: null,

	// toggle a toolbar section
	show : function(obj, el) {
		if (obj == ci_profiler_bar.current) {
			ci_profiler_bar.off(obj);
			ci_profiler_bar.current = null;
		} else {
			ci_profiler_bar.off(ci_profiler_bar.current);
			ci_profiler_bar.on(obj);
			ci_profiler_bar.remove_class(ci_profiler_bar.current, 'current');
			ci_profiler_bar.current = obj;
			//ci_profiler_bar.add_class(el, 'current');
		}
	},

	// turn an element on
	on : function(obj) {
		if (document.getElementById(obj) != null)
			document.getElementById(obj).style.display = '';
	},

	// turn an element off
	off : function(obj) {
		if (document.getElementById(obj) != null)
			document.getElementById(obj).style.display = 'none';
	},

	// toggle an element
	toggle : function(obj) {
		if (typeof obj == 'string')
			obj = document.getElementById(obj);

		if (obj)
			obj.style.display = obj.style.display == 'none' ? '' : 'none';
	},

	// open the toolbar
	open : function() {
		document.getElementById('ci-profiler-menu-open').style.display = 'none';
		document.getElementById('codeigniter-profiler').style.display = 'block';
		this.set_cookie('open');
	},

	// close the toolbar
	close : function() {
		document.getElementById('codeigniter-profiler').style.display = 'none';
		document.getElementById('ci-profiler-menu-open').style.display = 'block';
		this.set_cookie('closed');
	},

	// Add class to element
	add_class : function(obj, a_class) {
		alert(obj);
		document.getElementById(obj).className += " "+ a_class;
	},

	// Remove class from element
	remove_class : function(obj, r_class) {
		if (obj != undefined) {
			document.getElementById(obj).className = document.getElementById(obj).className.replace(/\bclass\b/, '');
		}
	},

	read_cookie : function() {
		var nameEQ = "Profiler=";
		var ca = document.cookie.split(';');
		for (var i=0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	},

	set_cookie : function(value) {
		var date = new Date();
		date.setTime(date.getTime() + (365*24*60*60*1000));
		var expires = "; expires=" + date.toGMTString();

		document.cookie = "Profiler=" + value + expires + "; path=/";
	},

	set_load_state : function() {
		var cookie_state = this.read_cookie();

		if (cookie_state == 'open') {
			this.open();
		} else {
			this.close();
		}
	},

	toggle_data_table : function(obj) {
		if (typeof obj == 'string') {
			obj = document.getElementById(obj + '_table');
		}

		if (obj) {
			obj.style.display = obj.style.display == 'none' ? '' : 'none';
		}
	}
};

window.onload = function() {
	ci_profiler_bar.set_load_state();
};