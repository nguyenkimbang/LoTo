
 
$(document).ready(function() {
    var table;

    var loadUserDataTable = function() {
        table = $('#system-table').DataTable( {
            dom: "Bfrtip",
            scrollY: 300,
            paging: false,
            bFilter: false,
            ajax: window.baseUrl + "/admin/config/system/get-data",
            columns: [
                { data: "Code" },
                { data: "Value" },
                { data: "Description" },
                {
                    "mRender": function(data, type, full) {
                        var html =
                        '<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">'+
                           '<div class="btn-group btn-group-sm" style="float: none;">'+
                               '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;">'+
                                   '<span class="glyphicon glyphicon-pencil"></span>'
                               +'</button><button type="button" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;">'+
                                   '<span class="glyphicon glyphicon-trash"></span>'+
                               '</button>'+
                           '</div>'+
                           '<div class="btn-group btn-group-sm" style="float: none;">'+
                               '<button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">'+
                                   '<span class="glyphicon glyphicon-floppy-disk"></span>'+
                               '</button>'+
                               '<button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">'+
                                   '<span class="glyphicon glyphicon-floppy-disk"></span>'+
                               '</button>'
                            '</div>'+
                           '<button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button>'+
                           '<button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button>'+
                       '</div>'
                        return html;
                    }
                }
            ],
            
            order: [ 1, 'asc' ],

            "initComplete": function(settings, json) {
                loadEditable();
            },

            
        })
    }
    

    var loadEditable = function() {
        $('#config-table').Tabledit({
            url: window.baseUrl + '/api/config',
            eUrlEdit:{
                url: window.baseUrl + '/api/loto/config',
                method: 'POST'
            },

            eDelete:{
                url: window.baseUrl + '/api/loto/config/remove',
                method: 'POST'
            },
            columns: {
                identifier: [0, 'Code'],
                editable: [
                    [0, 'Code'],
                    [2, 'Value'],
                    [3, 'Description']
                ]
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
                console.log('onAlways()');
            },
            onAjax: function(action, serialize) {
                return true;
            }
        })
    }

    loadUserDataTable();
    
} );