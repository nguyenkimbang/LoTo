function showErorr(data) {
    if (typeof data.code != 'undefined') {
        switch(data.code) {
            case 600:
                swal("Error!", 'Parent code không tồn tại', "error");
                
                break;
            case 601:
                swal("Error!", 'Số phần trăm còn lại không đủ', "error");
                break;
            case 602:
                swal("Error!", 'Đã hết số lượt vé trong ngày', "error");
                break;
            case 603:
                swal("Error!", 'Hết thời gian đặt vé', "error");
                break;
            case 604:
                swal("Error!", 'Post không tồn tại', "error");
                break;
            case 605:
                swal("Error!", 'Code đã tồn tại', "error");
                break;
            case 606:
                swal("Error!", 'Code không tồn tại', "error");
                break;
        }
    }
}