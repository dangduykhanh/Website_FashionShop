<?php
function buildProductCard($url, $name, $price, $masp, $class)
{
  return '
  <div class="pro'.$class.'" onclick="window.location.href=\'detail.php?id='.$masp.'\';">
          <img src="'.$url.'" alt="" />
          <div class="des'.$class.'">
            <span>Nike</span>
            <h5>'.$name.'</h5>
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>'.$price.' VNĐ</h4>
          </div>
          <a href="#"
            ><i class="fa-solid fa-cart-shopping fa-lg" id="shopping"></i
          ></a>
  </div>';
}

function buildProductCardFavorite($url, $name, $price, $size, $masp, $quantitymax)
{
  return '<form class="box" action="./controllers/favoriteitem.ctl.php" method="post">
      <a href="./controllers/favoriteitem.ctl.php?MaSP='.$masp.'" class="fas fa-xmark"></a>
      <input type="hidden" value="'.$masp.'" name="MaSPdetail">

      <img src="'.$url.'" alt="">
      <input type="hidden" value="'.$url.'" name="Urldetail">
      
      <div class="box-content">
          <span>NIKE</span>
          <h5>'.$name.'</h5>
          <h4>'.$price.' VNĐ</h4>
          <h6>Kích Thước: <span>'.$size.'</span></h6>
          <input type="hidden" value="'.$size.'" name="Sizedetail">

          <input type="hidden" value="1" name="Quantitydetail">
          <input type="hidden" value="'.$quantitymax.'" name="QuantitydetailMax">
          <input type="hidden" value="favorite" name="from">
      </div>
      <input type="submit" value="Thêm vào giỏ hàng" name="add_to_cart" class="btn">
  </form>';
}
?>