<?php
require_once('views/msg.php');
?>
<section id="header">
      <a href="./"><img src="./static/img/logo.png" class="logo" alt="" /></a>

        <ul id="navbar">
          <li><a href="./index.php">Trang Chủ</a></li>
          <li><a href="shop.php">Cửa hàng</a></li>
          <li><a href="purchaseorder.php">Đơn Hàng</a></li>
          <li><a href="contact.php">Liên Hệ</a></li>

          <li class="hide-icon">
            <a href="#" ><i class="fa-solid fa-user" id="btn-user" title="Đăng Nhập/Đăng Ký"></i></a>
          </li>
          <li class="hide-icon">
            <a href="search.php" title="Tìm Kiếm"><i class="fa-solid fa-magnifying-glass"></i></a>
          </li>
          <li class="hide-icon">
            <a href="favorite.php" title="Yêu Thích"><i class="fa-solid fa-heart"></i></a>
          </li>
          <li class="hide-icon">
            <a href="Cart.php" title="Giỏ Hàng"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          
          <!-- Hiển thị sau khi thay đổi kích thước màn hình -->
          <li class="show-icon">
            <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i> Tìm Kiếm</a>
          </li>
          <li class="show-icon">
            <a href="favorite.php"><i class="fa-solid fa-heart"></i> Yêu Thích</a>
          </li>
          <li class="show-icon">
            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</a>
          </li>

          <!-- Thẻ này được thêm vào khi mình làm responsive -->
          <a href="#" id="close"><i class="fa-solid fa-xmark fa-sm"></i></a>
        </ul>

      <!-- Thẻ này được thêm vào khi mình làm responsive -->
      <div id="mobile">
        <a href="#"><i class="fa-solid fa-user" id="btn-user" title="Đăng Nhập/Đăng Ký"></i></a>
        <i id="bar" class="fa-solid fa-bars"></i>
      </div>

      <!--  -->
      <div class="profile">
        <?php
        if(!empty($_SESSION['user']))
        {
          echo '<div class="user-image">
          <img src="./static/img/people/1.png" alt="">
          <p>'.$_SESSION['user']['HovaTen'].'</p>
        </div>';

          echo '<div class="user-item">
          <a href="./controllers/logout.ctl.php" >Đăng Xuất</a>
        </div>';
        }
        else
        {
          echo '<a href="login.php" >Đăng Nhập</a>';
          echo '<a href="register.php" >Đăng Ký</a>';
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