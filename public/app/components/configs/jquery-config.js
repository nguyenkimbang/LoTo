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
         
        //lay tat ca du lieu trong form login
        var data = $('form#config-form').serialize();
        var url = window.baseUrl + '/api/loto/config';
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
            window.location.href = window.baseUrl + '/admin/config'
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
            case 400:
                $('#show-error-config').html("This config existed!").addClass('danger');
                $("html").scrollTop(0);
                break;
        }
    }
}