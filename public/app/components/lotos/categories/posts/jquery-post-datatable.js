
 
$(document).ready(function() {
    var table;

    var loadUserDataTable = function() {
        table = $('#post-table').DataTable( {
            dom: "Bfrtip",
            scrollY: 300,
            paging: false,
            // sorting: true,
            bFilter: false,
            ajax: window.baseUrl + "/admin/category/post/get-data",
            columns: [
                { data: "Code" },
                { data: "Title_Seo" },
                { data: "Description_Seo" },
                { data: "Keyword_Seo" },
                { data: "Parent_Code" },
                {
                    "mRender": function(data, type, full) {
                        var disable = '';
                        if (typeof full != 'undifine' && typeof full.Type != 'undifine' && full.Type == 1) {
                            disable = 'disabled'
                        }
                        return createButtonAction(disable);
                    }
                }
            ],
            
            order: [ 1, 'desc' ],

            "initComplete": function(settings, json) {
                // loadEditable();
            },

            
        })
    }
    

    var loadEditable = function() {
        $('#post-table').Tabledit({
            url: window.baseUrl + '/api/loto/category/post',
            eUrlEdit:{
                url: window.baseUrl + '/api/loto/category/post/edit',
                method: 'POST'
            },

            eDelete:{
                url: window.baseUrl + '/api/loto/category/post/remove',
                method: 'POST'
            },
            columns: {
                identifier: [0, 'Code'],
                editable: [
                    [1, 'Title_Seo'],
                    [2, 'Description_Seo'],
                    [4, 'Parent_Code'],
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

    /**
     * [createButtonAction description]
     * @param  {[type]} disable [description]
     * @return {[type]}         [description]
     */
    function createButtonAction(disable)
    {
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
