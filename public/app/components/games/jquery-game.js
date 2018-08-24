/**
 * [description]
 * @param  {[type]} ){var submit [description]
 * @return {[type]}     [description]
 */
jQuery(document).ready(function()
{  

    var submit   = $('form#game-form').find("button[type='submit']");
     

    submit.click(function(evt)
    {    	
        var url = window.baseUrl + '/api/loto/game';
        var method = 'POST';

        if ($(this).attr('id') == 'edit') {
            url = window.baseUrl + '/api/loto/game/edit';
        }

        if (!$('form#game-form').valid()) {
            return;
        }

        var data = new FormData($('form#game-form')[0]);
        // console.log(data);

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
    processData: false,
    contentType: false,
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

function setDefaultValueLogin()
{
	$('#show-error').html('');
	$('#password-error').html('');
	$('#username-error').html('');
}

function removeGame(code) {
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
                url: window.baseUrl + '/api/loto/game/remove',
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