<?php 
require_once('modules/helpers.php');
?>
<section>
  <?php 
  include_once('views/msg.php'); 
  ?>
<div class="container-body">
    <div class="container">
        <div class="form login">
          <span class="title"> Đăng Nhập</span>

          <form action="./controllers/login.ctl.php" method="post">
            <div class="input-field">
              <input type="text" placeholder="Nhập email" title="Email phải có dạng abc@gmail.com" 
              name="email" value="<?php echo getURLParameter('email'); ?>" required />
              <i class="fa-solid fa-envelope icon"></i>
            </div>

            <div class="input-field">
              <input
                type="password"
                class="password"
                placeholder="Nhập mật khẩu"
                title="Mật khẩu tổi thiểu phải 8 ký tự"
                name="password"
                required
              />
              <i class="fa-solid fa-lock icon"></i>
              <i class="fa-solid fa-eye-slash showHidePw"></i>
            </div>

            <div class="input-field button">
              <input type="submit" value="ĐĂNG NHẬP" />
            </div>
          </form>

          <div class="login-signup">
            <span class="text">Không có tài khoản? </span>
            <a href="register.php" class="text signup-link">Đăng Ký</a>
          </div>
        </div>
    </div>
</div>
</section>