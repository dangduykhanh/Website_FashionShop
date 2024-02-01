<?php
require_once('views/msg.php');
?>
<section id="header">
      <a href="admin.php"><img src="./static/img/logo.png" class="logo" alt="" /></a>

        <ul id="navbar">
          <li><a href="admin.php">Trang Chủ</a></li>
          <li><a href="productadmin.php">Sản Phẩm</a></li>
          <li><a href="customer.php">Khách Hàng</a></li>
          <li><a href="orderadmin.php">Đơn Hàng</a></li>
          <li><a href="feedback.php">Góp ý</a></li>
          <li class="hide-icon">
            <a href="#" ><i class="fa-solid fa-user" id="btn-user" title="Đăng Nhập/Đăng Xuất"></i></a>
          </li>

          <!-- Thẻ này được thêm vào khi mình làm responsive -->
          <a href="#" id="close"><i class="fa-solid fa-xmark fa-sm"></i></a>
        </ul>

      <!-- Thẻ này được thêm vào khi mình làm responsive -->
      <div id="mobile">
        <a href="#"><i class="fa-solid fa-user" id="btn-user" title="Đăng Nhập/Đăng Xuất"></i></a>
        <i id="bar" class="fa-solid fa-bars"></i>
      </div>

      <!--  -->
      <div class="profile">
        <?php
        if(!empty($_SESSION['admin']))
        {
          echo '<div class="user-image">
          <img src="./static/img/people/4.png" alt="">
          <p>'.$_SESSION['admin']['TaiKhoan'].'</p>
        </div>';

          echo '<div class="user-item">
          <a href="./controllers/logout.ctl.php" >Đăng Xuất</a>
        </div>';
        }
        else
        {
          echo '<a href="login.php" >Đăng Nhập</a>';
        }
        ?>
        </div>
</section>

<script>

// js hiển profile của user khi ở màn hình lớn
  const profile = document.querySelector("#header .profile");
  const btnUs = document.querySelector("#navbar .hide-icon #btn-user");
  
  btnUs.onclick = function () {
  profile.classList.toggle("active");
  };

// js hiển profile của user khi màn hình nhỏ hơn
const btnUser = document.querySelector("#mobile #btn-user");

  btnUser.onclick = () => {
    profile.classList.toggle("active");
  };
</script>