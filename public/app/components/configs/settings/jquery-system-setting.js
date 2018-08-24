/**
 * [description]
 * @param  {[type]} ){var submit [description]
 * @return {[type]}     [description]
 */
jQuery(document).ready(function()
{  
    //khai báo nút submit form
    var submit   = $("button[type='submit']");
     
    //khi thực hiện kích vào nút Login
    submit.click(function()
    {       
        //hidden list error
        // setDefaultValueLogin();

        //check for invalid?
        // if(!checkValueLoginBefor()) {
        //     return false;
        // }
         if(!$('#setting-form').valid()) {
            return;
         }
        //lay tat ca du lieu trong form login
        var data = $('form#setting-form').serialize();
        var url = window.baseUrl + '/api/loto/config/setting';
        var method = 'POST';

        //request data to server
        sumitData(data, url, method);

        return false;
    });
});

function sumitData(dataReq = [], url = '', method = "POST")
{
    //su dung ham $.ajax()
    $.ajax({
    type : method, //kiểu post
    url  : url, //gửi dữ liệu sang trang submit.php
    data : dataReq,
    success :  function(dataRep) {
        if (typeof dataRep['status'] != 'undefine' && !dataRep['status']) {
            showErorr(dataRep);
        } else {
            window.location.href = window.baseUrl + '/admin/config/setting'
        }
    }
    });
}

function checkValueLoginBefor()
{
    //khai báo các biến
        var username = $("input[name='username']").val(); //get input value username
        var password = $("input[name='password']").val(); //get input value password
         
        //kiem tra xem da nhap tai khoan chua
        if(username == ''){
            $('#username-error').html('Enter your username, please!');
            return false;
        }
         
        //kiem tra xem da nhap mat khau chua
        if(password == ''){
            $('#password-error').html('Enter your password, please!');
            return false;
        }

        return true
}

function setDefaultValueLogin()
{
    $('#show-error').html('');
    $('#password-error').html('');
    $('#username-error').html('');
}

function showErorr(data) {
    if (typeof data.code != 'undefined') {
        switch(data.code) {
            case 700:
                swal("Error!", 'Hệ thống lỗi xin làm lại', "error");
                break;
            case 701:
                swal("Error!", 'Bạn không có quyền sử dụng tính năng này', "error");
                break;
            case 702:
                swal("Error!", 'Token sai hoặc hết hạn', "error");
                break;
            case 703:
                swal("Error!", 'Không tìm thấy tính năng này', "error");
                break;
            case 704:
                swal("Error!", 'Account bị lock liên hệ agent để biết thêm chi tiết', "error");
                break;
            case 705:
                swal("Error!", 'Hệ thống lỗi làm ơn làm lại', "error");
                break;
            case 706:
                swal("Error!", 'Thiếu agent code', "error");
                break;
            case 707:
                swal("Error!", 'Agent code không tồn tại', "error");
                break;
            case 708:
                swal("Error!", 'Agent hết hạn sử dụng', "error");
                break;
            case 605:
                swal("Error!", 'Code đã tồn tại', "error");
                break;
        }
    }
}

function removeSetting(code) {
    swal({
        title: "Bạn có chắc chắn?",
        text: "Bạn muốn xóa trường đã chọn!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Đồng ý, xóa nó!",
        cancelButtonText: "Không, hủy!",
        reverseButtons: !0
    }).then(function(e) {
        if (e.value == true) {
            $.ajax({
                url: window.baseUrl + '/api/loto/config/remove',
                type: 'post',
                dataType: 'json',
                data: {
                    Code: code
                },
                // beforeSend: function() {
                //     mApp.blockPage()
                // },
                success: function(res) {
                    if (res.hasOwnProperty("code") == true) {
                        swal("Hủy bỏ", messerr[res.code].messenger, "error")
                    } else {
                        swal("Xóa thành công!", "Đã xóa trường được chọn!", "success")
                        location.reload();
                    }
                }
            })
        } else {
            swal("Hủy bỏ", "Đã đã giữ lại trường đã chọn :)", "error")
        }
    })
}