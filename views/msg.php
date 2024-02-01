<?php
function displayAlert($message, $color)
{
    $alrt = '<div class="message %s">
                <span>%s</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>';
    return sprintf($alrt,$color, $message);
}

$msg = $_GET['msg'] ?? "";
if ($msg != "") {
    switch ($msg) {
        case 'done':
            echo (displayAlert('Đăng ký thành công','alert-success'));
            break;
        case 'done-contact':
            echo (displayAlert('Góp ý thành công','alert-success'));
            break;
        case 'invaild':
            echo (displayAlert('Vui lòng kiểm tra lại dữ liệu nhập vào','alert-danger'));
            break;
        case 'duplicate':
            echo (displayAlert('Username đã tồn tại, xin vui lòng chọn username khác','alert-warning'));
            break;
        case 'login-fail':
            echo (displayAlert('Đăng nhập thất bại','alert-danger'));
            break;
        case 'login-invaild':
            echo displayAlert('Bạn chưa đăng nhập','alert-warning');
            break;
        case 'filterbar-fail':
            echo displayAlert('Bạn chưa chọn điều kiện','alert-danger');
            break;
        case 'emptysearch':
            echo displayAlert('Bạn chưa nhập từ khóa tìm kiếm','alert-warning');
            break;
        case 'emptyproductfavorite':
            echo displayAlert('Bạn chưa chọn kích thước','alert-warning');
            break;
        case 'duplicate-favorite':
            echo displayAlert('Sản Phẩm đã được thêm vào yêu thích rồi','alert-warning');
            break;
        case 'update-favorite':
            echo displayAlert('Sản Phẩm đã được cập nhật mẫu mới','alert-success');
            break;
        case 'delete-favorite':
            echo displayAlert('Sản Phẩm đã được xóa khỏi yêu thích','alert-success');
            break;
        case 'duplicate-cart':
            echo displayAlert('Sản Phẩm đã được thêm vào giỏ hàng rồi','alert-danger');
            break;
        case 'emptyproductcart':
            echo displayAlert('Bạn chưa chọn kích thước và số lượng','alert-warning');
            break;
        case 'delete-cart':
            echo displayAlert('Sản Phẩm đã được xóa khỏi giỏ hàng','alert-success');
            break;
        case 'addfrom-favorite':
            echo displayAlert('Thêm thành công sản phẩm từ yêu thích','alert-success');
            break;
        case 'done-order':
            echo displayAlert('Đặt hàng thành công','alert-success');
            break;
        case 'Emptyvalue':
            echo displayAlert('Dữ liệu chưa được nhập đầy đủ','alert-warning');
            break;
        case 'checkemail':
            echo displayAlert('Vui lòng kiểm tra email - lưu ý: bạn cần có đăng ký tài khoản mới có thể góp ý','alert-warning');
           break;
        case 'deletedone-feedback':
            echo displayAlert('Xóa thành công góp ý','alert-success');
            break;
        case 'deletedone-customer':
            echo displayAlert('Xóa thành công tài khoản khách hàng','alert-success');
            break;
        case 'login-valuefail':
            echo displayAlert('Vui lòng kiểm tra lại tài khoản mật khẩu','alert-warning');
            break;
        case 'deletedone-order':
            echo displayAlert('Xóa thành công đơn hàng','alert-success');
            break;
        case 'updatedone-order':
            echo displayAlert('Cập nhật thành công tình trạng đơn hàng','alert-success');
            break;
        case 'insertdone-product':
            echo displayAlert('Thêm sản phẩm thành công','alert-success');
            break;
        case 'deletedone-product':
            echo displayAlert('Xóa sản phẩm thành công','alert-success');
            break;
        case 'updatedone-product':
            echo displayAlert('Cập nhật sản phẩm thành công','alert-success');
            break;
        case 'updatefail-product':
            echo displayAlert('Vui lòng kiểm tra lại dữ liệu','alert-danger');
            break;
        case 'loadfail-file':
            echo displayAlert('File đã tồn tại trong máy chủ web','alert-danger');
            break;
    }
}
