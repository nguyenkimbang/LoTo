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
    	setDefaultValueLogin();

    	//check for invalid?
        if(!checkValueLoginBefor()) {
        	return false;
        }
         
        //lay tat ca du lieu trong form login
        var data = $('form#form-login').serialize();
        var url = 'api/loto/user/login';
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
    		$('#show-error').html(showErrorLogin(['User or password not correct!']));
    		//set default value input is empty
    		$("input[name='password']").val('');
    	} else {
    		window.location.href = 'dashboard'
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

function showErrorLogin(listError = [])
{
	var html = '';
	if (Object.keys(listError).length) {
		for (key in listError) {
			html +='<div class="invalid-feedback-line">' + 
				listError[key]
            + '</div>'
		}
	}

	return html;
}

function setDefaultValueLogin()
{
	$('#show-error').html('');
	$('#password-error').html('');
	$('#username-error').html('');
}