
 
$(document).ready(function() {
    var table;

    var loadUserDataTable = function() {
        table = $('#config-table').DataTable( {
            dom: "Bfrtip",
            scrollY: 300,
            paging: false,
            bFilter: false,
            ajax: window.baseUrl + "/admin/config/get-data",
            columns: [
                { data: "Code" },
                { data: "Game_Code" },
                { data: "Value" },
                { data: "Type" },
                { data: "Parent_Code" },
                { data: "ETH_Address" },
                { data: "Description" },
                { data: "Status" },
                {
                    "mRender": function(data, type, full) {
                        console.log(full);
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
                           '</div>'+
                           '<div class="btn-group btn-group-sm tabledit-save-button" style="float: none;">'+
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
                    [1, 'Game_Code'],
                    [2, 'Value'],
                    [3, 'Type'],
                    [4, 'Parent_Code'],
                    [5, 'ETH_Address'],
                    [6, 'Description'],
                    [7, 'Status']
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