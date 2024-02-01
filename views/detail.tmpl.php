<?php
require_once('modules/productcard.php');
?>

<section id="prodetails" class="section-p1">
  <form id="form" action = "favorite.php" method = "POST">
    <div class="single-pro-image">
      <img src=<?php echo $anhbia; ?> width="100%" id="MainImg" />
      <input type="hidden" id="MainInput" value=<?php echo $anhbia; ?> name="Urldetail">

      <div class="small-img-group">
        <?php
          $chuoi ='<div class="small-img-col">
                  <img src="%s" width=%s class="small-img" alt="" />
                  </div>';

          foreach ($anhs as $anh) {
            echo(sprintf($chuoi,$anh['Url'],"100%"));
          }
        ?>
      </div>
    </div>

    <div class="single-pro-details">
      <h5>Trang Chủ / Danh Mục / <?php echo $danhmuc->getTenDM(); ?></h5>
      <h4><?php echo $sanpham->getTenSP(); ?></h4>
      <h2><?php echo number_format($sanpham->getDonGiaBan()); ?> VNĐ</h2>

      <input type="hidden" name="MaSPdetail" value="<?php echo $sanpham->getMaSP(); ?>">
      <input type="hidden" name="from" value="detail">

      <select id="Size-KT" name="Sizedetail" onchange="updateQuantityOptions()">
        <option disabled selected>Chọn size</option>
        <?php foreach($kichthuoc as $kt)
        {
          echo '<option value="'.$kt['MaKT'].'" data-so-luong="'.$kt['SoLuong'].'">'.$kt['TenKT'].'</option>';
        } ?>
      </select>

      <input type="hidden" name="QuantitydetailMax" id="QuantitydetailMax" value="">
      
      <select id="Quantity-SL" name="Quantitydetail" >
        <option disabled selected></option>
      </select>

      <button class="normal" id="btn-addfavorite">yêu thích <i class="fa-regular fa-heart"></i></button>
      <button class="normal" id="btn-addcart">Thêm vào giỏ hàng</button>

      <h4>Thông Tin Sản Phẩm</h4>

      <span><?php echo $sanpham->getMoTa(); ?></span
      >
    </div>
  </form>
</section>

<section id="product1" class="section-p1">
  
  <h2>YOU MIGHT ALSO LIKE</h2>
  <p>Summer Collection New Morden Design</p>
  <div class="pro-container">
    <?php
    foreach ($sanphamlienquan as $SP) {
      echo BuildProductCard($SP['Url'], $SP['TenSP'], number_format($SP['DonGiaBan']), $SP['MaSP'],'');
    }
    ?>
  </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
  <div class="newstext">
    <h4>Sign Up For Newsletter</h4>
    <p>
      Get E-mail updates about our latest shop and
      <span>special offers</span>
    </p>
  </div>
</section>

<script>
  
// js ảnh thumbnail của file detail.tmpl.php
var MainImg = document.getElementById("MainImg");
var smallimg = document.getElementsByClassName("small-img");
var MainInput = document.getElementById("MainInput");

smallimg[0].onclick = function () {
  MainImg.src = smallimg[0].src;
  MainInput.value = smallimg[0].src
};
smallimg[1].onclick = function () {
  MainImg.src = smallimg[1].src;
  MainInput.value = smallimg[1].src
};
smallimg[2].onclick = function () {
  MainImg.src = smallimg[2].src;
  MainInput.value = smallimg[2].src
};

// js khi nhấn nút nào thì form sẽ chay đến file đó
document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("#prodetails #form");
  var favoriteButton = document.getElementById("btn-addfavorite");
  var cartButton = document.getElementById("btn-addcart");

  cartButton.addEventListener("click", function () {
    // Thay đổi thuộc tính hành động của form thành "cart.php"
    form.action = "cart.php";
    form.method = "POST";
    form.submit(); // Gửi form
  });
});
</script>