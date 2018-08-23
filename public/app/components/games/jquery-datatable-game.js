var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {

    $("#game-table").mDatatable({
        data: {
            type: "remote",
            source: {read: {url: window.baseUrl + '/api/loto/game/get-data'}},
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
                    field: "Name",
                    title: "Name",
                }, {
                    field: "Price",
                    title: "Price",
                }, {
                    field: "Color",
                    title: "Color"
                }, {
                    field: "Collection_No",
                    title: "Collection No",

                }, {
                    field: "Picked_No",
                    title: "Picked No",

                }, {
                    field: "Expire_Time",
                    title: "Expire Time",

                }, {
                    field: "Draw_Time",
                    title: "Draw Time",

                }, {
                    field: "Image",
                    title: "Image",
                    responsive: {
                        visible: "lg"
                    }

                }, {
                    field: "Status",
                    title: "Status",
                    field: "Status",
                title: "Status",
                template: function(e) {
                    var r = {
                        1: {
                            title: "Pending",
                            class: "m-badge--brand"
                        },
                        2: {
                            title: "Delivered",
                            class: " m-badge--metal"
                        },
                        3: {
                            title: "Canceled",
                            class: " m-badge--primary"
                        },
                        4: {
                            title: "Success",
                            class: " m-badge--success"
                        },
                        5: {
                            title: "Info",
                            class: " m-badge--info"
                        },
                        6: {
                            title: "Danger",
                            class: " m-badge--danger"
                        },
                        7: {
                            title: "Warning",
                            class: " m-badge--warning"
                        }
                    };
                    return '<span class="m-badge ' + r[e.Status].class + ' m-badge--wide">' + r[e.Status].title + "</span>"
                }

                }, {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(e, a, i) {

                        return `
                        <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">
                            <i class="la la-edit"></i>
                        </button>
                        <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-delete-button"  onclick="removeGame('`+ e.Code +`')">
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
        table = $('#game-table').DataTable( {
            dom: "Bfrtip",
            // scrollY: 300,
            paging: false,
            bFilter: false,
            ajax: window.baseUrl + "/admin/game/get-data",
            columns: [
                { data: "Code" },
                { data: "Name" },
                { data: "Price" },
                { data: "Color" },
                { data: "Collection_No" },
                { data: "Picked_No" },
                { data: "Expire_Time" },
                { data: "Draw_Time" },
                { data: "Status" },
                { data: "Image" },
                {
                    "mRender": function(data, type, full) {
                        return createActionButton();
                    }
                }
            ],
            
            order: [ 1, 'DESC' ],

            "initComplete": function(settings, json) {
                loadEditable();
            },

            
        })
    }
    

    var loadEditable = function() {
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
                identifier: [0, 'Code'],
                editable: [
                    [1, 'Name'],
                    [2, 'Price'],
                    [3, 'Color'],
                    [4, 'Collection_No'],
                    [5, 'Picked_No'],
                    [6, 'Expire_Time'],
                    [7, 'Draw_Time'],
                    [8, 'Status'],
                    [9, 'Image']
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