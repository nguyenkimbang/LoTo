jQuery(document).ready(function() {

	var table;

	$('#editRow').on('click', function(evt) {
		console.log($this);
	})
	createForm = function(tr) {
		//
	}
});

if (typeof jQuery === 'undefined') {
  throw new Error('Tabledit requires jQuery library.');
}

(function($) {
	'use strict';

	$.fn.editableTable = function(options) {
		if (!this.is('table')) {
			throw new Error('Tabledit only works when applied to a table.');
		}
	}
}(jQuery));
