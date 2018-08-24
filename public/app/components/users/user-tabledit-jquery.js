
$(document).ready(function() {

    $("#user-table").mDatatable({
        data: {
            type: "remote",
            source: {read: {url: window.baseUrl + '/api/loto/user/get-data'}},
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
                    field: "ID",
                    title: "ID"
                }, {
                    field: "Username",
                    title: "Username",
                }, {
                    field: "Full_Name",
                    title: "Full Name",
                    responsive: {
                        visible: "lg"
                    }
                }, {
                    field: "Role_Code",
                    title: "Role Code",
                }, {
                    field: "Avatar",
                    title: "Avatar",

                }, {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(e, a, i) {

                        var url = '#';
                        var disble = 'disabled';

                        // if(e.Type != 1) {
                        //     url = window.baseUrl +`/admin/user/edit/`+e.ID;
                        //     disble = '';
                        // }

                        return `
                        <a href="`+url+`" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">
                            <i class="la la-edit"></i>
                        </a>`+
                        // <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">onclick="removeUser('`+ e.ID +`')
                        //     <i class="la la-edit"></i>
                        // </button>
                        `<button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-delete-button"    ` +disble+ `">
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
    
    // Activate the bubble editor on click of a table cell
    // $('#example').on( 'click', 'tbody td:not(:first-child)', function (e) {
    //     editor.bubble( this );
    // } );

    var table;

    var loadUserDataTable = function() {
        table = $('#user-table').DataTable( {
            dom: "Bfrtip",
            scrollY: 300,
            paging: false,
            bFilter: false,
            ajax: window.baseUrl + "/admin/user/get-data",
            columns: [
                { data: "Username" },
                { data: "Full_Name" },
                { data: "Role_Code" },
                { data: "Avatar" },
                {
                    "mRender": function(data, type, full) {
                        return createActionButton();
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
        $('#user-table').Tabledit({
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
                identifier: [0, 'Username'],
                editable: [
                    [1, 'Fullname'],
                    [2, 'Role_Code'],
                    [3, 'Avatar']
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
                // console.log('onAlways()');
            },
            onAjax: function(action, serialize) {
                return true;
            }
        })
    }

    // loadUserDataTable();

    function createActionButton() {
        var disable = '';
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
    
} );