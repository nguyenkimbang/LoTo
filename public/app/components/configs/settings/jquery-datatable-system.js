
 
$(document).ready(function() {
    var table;
$.fn.dataTable.ext.errMode = 'none';
    var loadUserDataTable = function() {
        table = $('#system-table').DataTable( {
            dom: "Bfrtip",
            scrollY: 300,
            paging: false,
            bFilter: false,
            ajax: window.baseUrl + "/admin/config/setting/get-data",
            columns: [
                { data: "Code" },
                { data: "Value" },
                { data: "Description" },
                {
                    "mRender": function(data, type, full) {
                        
                        var disable = '';
                        if (typeof full != 'undifine' && typeof full.Type != 'undifine' && full.Type == 1) {
                            disable = 'disabled'
                        }
                        var html =
                        '<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">'+
                           '<div class="btn-group btn-group-sm" style="float: none;">'+
                               '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;"'+ disable +'>'+
                                   '<span class="glyphicon glyphicon-pencil"></span>'+
                                '</button>'+
                               '</button><button type="button" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;"'+ disable +'>'+
                                   '<span class="glyphicon glyphicon-trash"></span>'+
                               '</button>'+
                               '<button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">'+
                                   '<span class="glyphicon glyphicon-floppy-disk"></span>'+
                               '</button>'+
                               '<button type="button" class="tabledit-cancel-button btn btn-sm btn-default" style="display: none; float: none;">'+
                                   '<span class="glyphicon glyphicon-remove"></span>'+
                               '</button>'
                            '</div>'+
                       '</div>';
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
        $('#system-table').Tabledit({
            url: window.baseUrl + '/api/config',
            eUrlEdit:{
                url: window.baseUrl + '/api/loto/config/setting/edit',
                method: 'POST'
            },

            eDelete:{
                url: window.baseUrl + '/api/loto/config/setting/remove',
                method: 'POST'
            },
            columns: {
                identifier: [0, 'Code'],
                editable: [
                    [1, 'Value'],
                    [2, 'Description']
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