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

        console.log(111);
        return;

        if (!$('form#user-form').valid()) {
            return;
        }

        var url = window.baseUrl + '/api/loto/user';
        var method = 'POST';

        if ($(this).attr('id') == 'edit') {
            url = window.baseUrl + '/api/loto/user/edit';
        }
        //lay tat ca du lieu trong form login
        var data = $('form#user-form').serialize();

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
            window.location.href = window.baseUrl + '/admin/category'
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
            case 600:
                $('#show-error-config').html('Parent code not exist!').addClass('danger');
                $("html").scrollTop(0);
                break;
            case 601:
                $('#show-error-config').html('Total percentage is not enough!').addClass('danger');
                $("html").scrollTop(0);
                break;
            case 602:
                $('#show-error-config').html("Today's ticket has out of!").addClass('danger');
                $("html").scrollTop(0);
                break;
            case 605:
                $('#show-error-config').html("This category existed!").addClass('danger');
                $("html").scrollTop(0);
                break;
            case 606:
                $('#show-error-config').html("The code not existed!").addClass('danger');
                $("html").scrollTop(0);
                break;
        }
    }
}

function removeUser(id) {
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
                url: window.baseUrl + '/api/loto/user/remove',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id
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