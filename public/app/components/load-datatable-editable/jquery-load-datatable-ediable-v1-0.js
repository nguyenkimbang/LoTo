

if (typeof jQuery === 'undefined') {
  throw new Error('Tabledit requires jQuery library.');
}

(function($) {
	'use strict';

	/*options*/
	$.fn.loadDatablEditable = function(options) {
		if (!this.is('table')) {
			throw new Error('Tabledit only works when applied to a table.');
		}

		var table;
		var identifierNumber = 0;
		var identifierText = 'ID';
		var columns = [];
		var url = window.location.href;
		var listEdiable = [];

	    var loadUserDataTable = function() {
	        table = $('#game-table').DataTable( {
	            dom: "Bfrtip",
	            scrollY: 300,
	            paging: false,
	            bFilter: false,
	            ajax: url,
	            columns: columns,
	            
	            order: [ 1, 'asc' ],

	            "initComplete": function(settings, json) {
	                loadEditable();
	            },

	            
	        })
	    }
	    

	    var loadEditable = function() {
	    	construct.optionEdibale(columns);
	        //load edit inline
	        $('#game-table').Tabledit({
	            url: window.baseUrl + '/api/user',
	            eUrlEdit:{
	                url: window.baseUrl + '/api/user',
	                method: 'POST'
	            },

	            eDelete:{
	                url: window.baseUrl + '/api/user',
	                method: 'PUT'
	            },
	            columns: {
	                identifier: [identifierNumber, identifierText],
	                editable: listEdiable
	            },
	            onDraw: function() {
	                // console.log(1111);
	            },
	            onSuccess: function(data, textStatus, jqXHR) {
	                // table.ajax.reload(function() {
	                //     loadEditable();
	                // });
	            },
	            onFail: function(jqXHR, textStatus, errorThrown) {
	            },
	            onAlways: function() {
	                // console.log('onAlways()');
	            },
	            onAjax: function(action, serialize) {
	                return true;
	            }
	        })
	    }

	    loadUserDataTable();

	    function createActionButton() {
	        var html =
	            '<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">'+
	               '<div class="btn-group btn-group-sm" style="float: none;">'+
	                   '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;">'+
	                       '<span class="glyphicon glyphicon-pencil"></span>'
	                   +'</button><button type="button" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;">'+
	                       '<span class="glyphicon glyphicon-trash"></span>'+
	                   '</button>'+
	               '</div>'+
	               '<button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">'+
	               '<span class="glyphicon glyphicon-floppy-disk"></span>'+
	               '</button>'+
	               '<button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>'+
	               '<button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>'+
	           '</div>'
	        return html;
	    }


	    var construct = {
	    	optionEdibale : function(columns) {
	    		var indx = 0;
	    		columns.forEach(function(val) {
	    			listEdiable.push([indx, val.data]);

	    			if (val.data === identifierText) {
	    				identifierNumber = indx;
	    			}

	    			indx++;
	    		});
	    	}
	    }
	}
}(jQuery));
