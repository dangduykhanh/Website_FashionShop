<section class="user-accounts section-p1">

   <h2 class="title">QUẢN LÝ TÀI KHOẢN KHÁCH HÀNG</h2>

   <div class="box-container">

   <?php 
      if(!empty($dstaikhoan))
      {
         foreach ($dstaikhoan as $tk) {
            echo '<div class="box">
        
            <img src="./static/img/people/4.png" alt="">
           
            <p> Mã tài khoản : <span>'.$tk->getMaKH().'</span></p>
            <p> Tài khoản : <span>'.$tk->getTaiKhoan().'</span></p>
            <p> Họ và tên : <span>'.$tk->getHovaTen().'</span></p>
            <p> Số điện thoại : <span>'.$tk->getSoDienThoai().'</span></p>
            <p> Địa chỉ : <span>'.$tk->getDiaChi().'</span></p>
            <a href="./controllers/customeritem.ctl.php?makh='.$tk->getMaKH().'" class="delete-btn">XÓA TÀI KHOẢN</a>
           
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
