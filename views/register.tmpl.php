<?php
require_once('modules/helpers.php');
?>
<section>
    <?php include_once ('views/msg.php'); ?>
<div class="container-body">
    <div class="container">
        <div class="form signup">
          <span class="title">Đăng Ký</span>

          <form action="./controllers/register.ctl.php" method="post">
            <div class="input-field">
              <input type="text" placeholder="Nhập họ và tên" title="Họ và tên không dài hơn 256 ký tự" name="username" value="<?php echo getURLParameter('username'); ?>" required />
              <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-field">
              <input type="text" placeholder="Nhập email" title="Email phải có dạng abc@gmail.com" name="email" value="<?php echo getURLParameter('email'); ?>" required />
              <i class="fa-solid fa-envelope icon"></i>
            </div>

            <div class="input-field">
              <input
                type="password"
                class="password"
                placeholder="Nhập mật khẩu"
                name="password"
                title="Mật khẩu tổi thiểu phải 8 ký tự"
                required
              />
              <i class="fa-solid fa-lock icon"></i>
              <i class="fa-solid fa-eye-slash showHidePw"></i>
            </div>

            <div class="input-field">
              <input
                type="text"
                placeholder="Nhập số điện thoại"
                name="phonenumber"
                title="số điện thoại phải 10 hoặc 11 số"
                value="<?php echo getURLParameter('phonenumber'); ?>"
                required
              />
              <i class="fa-solid fa-phone icon"></i>
            </div>

            <div class="input-field">
              <input type="text" placeholder="Nhập địa chỉ" name="address" value="<?php echo getURLParameter('address'); ?>" required />
              <i class="fa-solid fa-location-dot icon"></i>
            </div>

            <div class="input-field button">
              <input type="submit" value="ĐĂNG KÝ" />
            </div>
          </form>

          <div class="login-signup">
            <span class="text">Đã có tài khoản?</span>
            <a href="login.php" class="text login-link">Đăng Nhập</a>
          </div>
        </div>
    </div>
</div>
</section>