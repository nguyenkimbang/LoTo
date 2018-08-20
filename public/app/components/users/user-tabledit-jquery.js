var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    
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
                { data: "ID" },
                { data: "Username" },
                { data: "Full_Name" },
                { data: "Role_Code" },
                { data: "Avatar" },
            ],
            order: [ 1, 'asc' ],
            buttons: [
                { extend: "create", editor: editor },
                { extend: "edit",   editor: editor },
                { extend: "remove", editor: editor }
            ],

            "initComplete": function(settings, json) {
                console.log(11)
                loadEditable();
            }
        })
    }
    

    var loadEditable = function() {
        $('#user-table').Tabledit({
            url: window.baseUrl + '/api/user',
            columns: {
                identifier: [0, 'ID'],
                editable: [[1, 'Username'], [2, 'Fullname'], [3, 'Role_Code'], [4, 'Avatar']]
            },
            onDraw: function() {
            },
            onSuccess: function(data, textStatus, jqXHR) {
                table.ajax.reload(function() {
                    loadEditable();
                });
            },
            onFail: function(jqXHR, textStatus, errorThrown) {
            },
            onAlways: function() {
                console.log('onAlways()');
            },
            onAjax: function(action, serialize) {
            }
        })
    }

    loadUserDataTable();
    
} );