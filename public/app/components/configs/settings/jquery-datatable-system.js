
 
$(document).ready(function() {

jQuery(document).ready(function() {
    $("#setting-table").mDatatable({
        data: {
            type: "remote",
            source: {read: {url: window.baseUrl + '/api/loto/config/setting/get-data'}},
            pageSize: 10,
            saveState: {cookie: !1, webstorage: !1},
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0
        },
        layout: {theme: "default", class: "", scroll: !1, height: 'auto', footer: !1},
        sortable: !0,
        filterable: !1,
        pagination: !0,
        columns: [
                {
                    field: "Code",
                    title: "Code"
                }, {
                    field: "Value",
                    title: "Value",
                }, {
                    field: "Description",
                    title: "Description",
                    responsive: {
                        visible: "lg"
                    }
                }, {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(e, a, i) {

                        return `
                        <a href="`+window.baseUrl +`/admin/config/setting/edit/`+e.Code+`" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">
                            <i class="la la-edit"></i>
                        </a>`+
                        // <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">
                        //     <i class="la la-edit"></i>
                        // </button>
                        `
                        <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-delete-button"  onclick="removeSetting('`+ e.Code +`')">
                            <i class="la la-trash"></i>
                        </button>
                        <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-save-button" style="display: none; float: none;">
                            <i class="la la-save"></i>
                        </button>
                        <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-cancel-button"  style="display: none; float: none;">
                            <i class="la la-times"></i>
                        </button>`
                    }
                }

            ],
        });
    })

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

    // loadUserDataTable();
    
} );