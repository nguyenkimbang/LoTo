jQuery(document).ready(function() {
    $("#post-table").mDatatable({
        data: {
            type: "remote",
            source: {read: {url: window.baseUrl + '/api/loto/post/get-data'}},
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
                    field: "Title",
                    title: "Title",
                }, {
                    field: "Category_Code",
                    title: "Category_Code",
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
                        <a href="`+window.baseUrl +`/admin/post/edit/`+e.ID+`" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">
                            <i class="la la-edit"></i>
                        </a>`+
                        // <button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-edit-button">
                        //     <i class="la la-edit"></i>
                        // </button>
                        `<button class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tabledit-delete-button"  onclick="removePost('`+ e.ID +`')">
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
    // setTimeout(function() {
    //     $('#config-table').find('table').Tabledit({
    //         url: window.baseUrl + '/api/config',
    //         eUrlEdit:{
    //             url: window.baseUrl + '/api/loto/config',
    //             method: 'POST'
    //         },

    //         eDelete:{
    //             url: window.baseUrl + '/api/loto/config/remove',
    //             method: 'POST'
    //         },
    //         columns: {
    //             identifier: [0, 'Code'],
    //             editable: [
    //                 [1, 'Game_Code'],
    //                 [2, 'Value'],
    //                 [3, 'Type'],
    //                 [4, 'Parent_Code'],
    //                 [5, 'ETH_Address'],
    //                 [6, 'Description'],
    //                 [7, 'Status']
    //             ]
    //         },
    //         onDraw: function() {
    //             // console.log(1111);
    //         },
    //         onSuccess: function(data, textStatus, jqXHR) {
    //             // table.ajax.reload(function() {
    //             //     loadEditable();
    //             // });
    //         },
    //         onFail: function(jqXHR, textStatus, errorThrown) {
    //         },
    //         onAlways: function() {
    //             console.log('onAlways()');
    //         },
    //         onAjax: function(action, serialize) {
    //             return true;
    //         }
    //     })
    // }, 3000);
})
