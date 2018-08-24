
$(document).ready(function() {
    $("#category-table").mDatatable({
        data: {
            type: "remote",
            source: {read: {url: window.baseUrl + '/api/loto/category/get-data'}},
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
                    field: "Title_Seo",
                    title: "Title Seo",
                }, {
                    field: "Description_Seo",
                    title: "Description Seo",
                    responsive: {
                        visible: "lg"
                    }
                }, {
                    field: "Keyword_Seo",
                    title: "Ship Keyword Seo",
                    responsive: {
                        visible: "lg"
                    }
                }, {
                    field: "Parent_Code",
                    title: "Parent Code",

                }, {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(e, a, i) {

                        return `
                        <a href="`+ window.baseUrl+`/admin/category/edit/`+ e.Code +`" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                            <i class="la la-edit"></i>
                        </a>
                        <a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View " onclick="removeCategory('`+ e.Code +`')">
                            <i class="la la-trash"></i>
                        </a>`
                    }
                }

        ],
    });
});
