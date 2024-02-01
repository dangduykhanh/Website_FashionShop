<section class="placed-orders section-p1">

   <h2 class="title">QUẢN LÝ ĐƠN HÀNG</h2>

   <div class="box-container">

      <?php
         if(!empty($dsdonhang))
         {
            foreach ($dsdonhang as $dh) {
               
               $disabled ='';
               if($dh->getTinhTrangDH() == "Đã hoàn thành")
               {
                  $disabled='disabled';
               }
               echo ' <div class="box">
               <p> Mã đơn hàng : <span>'.$dh->getMaDH().'</span> </p>
               <p> Ngày đặt hàng : <span>'.$dh->getNgayDatHang().'</span> </p>
               <p> Email : <span>'.$dh->getEmail().'</span> </p>
               <p> Họ và tên : <span>'.$dh->getHovaTen().'</span> </p>
               <p> Số điện thoại : <span>'.$dh->getSoDienThoai().'</span> </p>
               <p> Địa chỉ : <span>'.$dh->getDiaChi().'</span> </p>
               <p> Sản phẩm : ';
               
               foreach ($dssanpham as $dssp) {
                  if($dssp->getMaDH() == $dh->getMaDH())
                  {
                     echo '<span>'.$dssp->getTenSP().'</span> ;';
                  }
               }
               echo'</p>
               <p> Phương thức thanh toán: <span>'.$dh->getPhuongThucThanhToan().'</span> </p>
               <p> Tổng tiền : <span>'.number_format($dh->getTongTien()).' VNĐ</span> </p>
               <form action="./controllers/orderadminitem.ctl.php" method="POST">
                  <input type="hidden" name="order_id" value="'.$dh->getMaDH().'">
                  <select name="update_payment" class="drop-down" '.$disabled.'>
                     <option selected disabled>'.$dh->getTinhTrangDH().'</option>
                     <option value="Đã chấp nhận">Đã chấp nhận</option>
                     <option value="Đã hoàn thành">Đã hoàn thành</option>
                  </select>
                  <div class="flex-btn">
                     <input type="submit" name="update_order" class="option-btn" value="CẬP NHẬT">
                     <a href="./controllers/orderadminitem.ctl.php?madh='.$dh->getMaDH().'" class="delete-btn" onclick="">XÓA</a>
                  </div>
               </form>
            </div>';
            }   
         }
         else
         {
            echo '<p class="empty">Chưa có góp ý của khách hàng</p>';
         }
      ?>
   </div>

</section>