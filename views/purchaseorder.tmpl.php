<section class="placed-orders">

   <h1 class="title">Đơn Đặt hàng</h1>

   <div class="box-container">
    <?php
        if(!empty($donhangs))
        {
            foreach ($donhangs as $donhang) {
                echo '<div class="box">
                <p> Ngày đặt hàng : <span>'.$donhang->getNgayDatHang().'</span> </p>
                <p> Họ và tên : <span>'.$donhang->getHovaTen().'</span> </p>
                <p> Số Điện thoại : <span>'.$donhang->getSoDienThoai().'</span> </p>
                <p> Email : <span>'.$donhang->getEmail().'</span> </p>
                <p> Địa Chỉ : <span>'.$donhang->getDiaChi().'</span> </p>
                <p> Phương thức thanh toán : <span>'.$donhang->getPhuongThucThanhToan().'</span> </p>
                <p> Sản phẩm :';
            

            foreach ($listsanphamchitiet as $sanphamdh) {
                if($donhang->getMaDH() == $sanphamdh->getMaDH())
                {
                    echo ' <span>'.$sanphamdh->getTenSP().'</span> ;';
                }
            }
                echo '</p>';
                echo '<p> Tổng số tiền : <span>'.number_format($donhang->getTongTien()).' VNĐ</span> </p>
                <p> Tình trạng đơn hàng : <span style="color: red;">'.$donhang->getTinhTrangDH().'</span> </p>
             </div>';
            }
        }
    ?>
   </div>

    <section id="tb">
    <?php 
        if(!isset($_SESSION['user']))
        {
            echo '<p class="empty">Bạn chưa có đơn hàng</p>';
        }
        elseif(isset($_SESSION['user']) && empty($donhangs) && empty($sanphamdonhangs))
        {
            echo '<p class="empty">Bạn chưa có đơn hàng</p>';
        }
    ?>
    </section>

</section>