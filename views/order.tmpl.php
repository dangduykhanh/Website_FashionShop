<section class="display-orders">
    <?php
    foreach($cart as $ca) 
    {
        echo '<p> Sản Phẩm: '.$ca->getTenSP().' <span> - '.$ca->getSoLuong().'/'.number_format($ca->getDonGia()).' VNĐ - '.$ca->getKichThuoc().'</span> ;</p>';
    }
    ?>
   
</section>

<section class="checkout-orders">

   <form action="./controllers/orderitem.ctl.php" method="post">

        <h3> ĐƠN ĐẶT HÀNG CỦA BẠN</h3>
        <div class="flex">
            <input type="hidden" name="magh" value="<?php echo $magh; ?>">
            <input type="hidden" name="makh" value="<?php echo $makh; ?>">
            <div class="inputBox">
                <span>Họ và tên :</span>
                <input type="text" name="name" placeholder="Nhập họ và tên" 
                value="<?php if(isset($khachhang)) { echo $khachhang->getHovaTen();} ?>" class="box" required>
            </div>
            <div class="inputBox">
                <span>Số Điện Thoại :</span>
                <input type="number" name="number" placeholder="Nhập số điện thoại" 
                value="<?php if(isset($khachhang)) { echo $khachhang->getSoDienThoai();} ?>" class="box" required>
            </div>
            <div class="inputBox">
                <span>Email :</span>
                <input type="email" name="email" placeholder="Nhập email của bạn" 
                value="<?php if(isset($khachhang)) { echo $khachhang->getTaiKhoan();} ?>" class="box" required>
            </div>
            <div class="inputBox">
                <span>Phương thức thanh toán :</span>
                <select name="method" class="box" required>
                <option value="Thanh toán khi giao hàng">Thanh toán khi giao hàng</option>
                <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Địa Chỉ :</span>
                <input type="text" name="address" placeholder="Nhập địa chỉ của bạn" 
                value="<?php if(isset($khachhang)) { echo $khachhang->getDiaChi();} ?>" class="box" required>
            </div>
            <div class="inputBox">
                <span>Tổng Số Tiền</span>
                <input type="text" value="<?php echo number_format($tongtien); ?> VNĐ" class="box" required>
                <input type="hidden" name="total" value="<?php echo $tongtien; ?>" required>
            </div>
            </div>
        </div>
      <input type="submit" class="btn" value="ĐẶT HÀNG">

   </form>

</section>