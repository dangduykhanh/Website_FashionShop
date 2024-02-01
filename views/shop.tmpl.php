<?php
require_once('modules/pagination.php');
require_once('modules/productcard.php');
?>

<section id="page-header">
      <h2>#stayhome</h2>
      <p>save more with coupons & up to 70% off!</p>
</section>

    <section id="productshop" class="section-p2">
    <div class="shop-body">
      <form class="simplebar-wrapper" action="./controllers/shopfilterbar.ctl.php" method="get">
        <h2>FILTER BAR</h2>
        <h4>DANH MỤC</h4>
        <div class="simplebar-content">
          <ul>
            <li>
              <input type="radio" value="DM1" id="ao" name="danhmuc" onclick="inputclick(event)" 
              <?php if(isset($_GET['category'])) {  if($_GET['category']=='DM1'){echo 'checked';}}  ?>>
              <label for="ao">Áo</label>
            </li>
            
            <li>
              <input type="radio" value="DM2" id="quan" name="danhmuc" onclick="inputclick(event,'danhmuc')"
              <?php if(isset($_GET['category'])) {  if($_GET['category']=='DM2'){echo 'checked';}}  ?>>
              <label for="quan">Quần</label>
            </li>

            <li>
              <input type="radio" value="DM3" id="giay" name="danhmuc" onclick="inputclick(event,'danhmuc')"
              <?php if(isset($_GET['category'])) {  if($_GET['category']=='DM3'){echo 'checked';}}  ?>>
              <label for="giay">Giày</label>
            </li>
          </ul>
        </div>

        <h4> GIỚI TÍNH</h4>
        <div class="simplebar-content">
          <ul>
            <li>
              <input type="radio" value="nam" id="nam" name="gioitinh" onclick="inputclick(event,'gioitinh')"
              <?php if(isset($_GET['gender'])) {  if($_GET['gender']=='nam'){echo 'checked';}}  ?>>
              <label for="nam">Nam</label>
            </li>
            
            <li>
              <input type="radio" value="nu" id="nu" name="gioitinh" onclick="inputclick(event,'gioitinh')"
              <?php if(isset($_GET['gender'])) {  if($_GET['gender']=='nu'){echo 'checked';}}  ?>>
              <label for="nu">Nữ</label>
            </li>
          </ul>
        </div>

        <h4>MỨC GIÁ</h4>
        <div class="simplebar-content">
          <ul>
            <li>
              <input type="radio" value="100" id="duoi1" name="mucgia" onclick="inputclick(event,'mucgia')"
              <?php if(isset($_GET['price'])) {  if($_GET['price']==100){echo 'checked';}}  ?>>
              <label for="duoi1">Dưới 1 Triệu</label>
            </li>
            
            <li>
              <input type="radio" value="115" id="1to1,5" name="mucgia" onclick="inputclick(event,'mucgia')"
              <?php if(isset($_GET['price'])) {  if($_GET['price']==115){echo 'checked';}}  ?>>
              <label for="1to1,5">1 - 1,5 triệu</label>
            </li>

            <li>
              <input type="radio" value="150" id="tren1" name="mucgia" onclick="inputclick(event,'mucgia')"
              <?php if(isset($_GET['price'])) {  if($_GET['price']==150){echo 'checked';}}  ?>>
              <label for="tren1">Trên 1,5 triệu</label>
            </li>
          </ul>
        </div>

        <div id="btn-search">
        <button type="submit"> Tìm Kiếm </button>
      </div>
      </form>

      <div class="pro-containershop">
        <?php 
        if (!empty($sanphamAll)) {
          foreach($sanphamAll as $sanpham)
          {
            echo buildProductCard($sanpham['Url'],$sanpham['TenSP'],number_format($sanpham['DonGiaBan']),$sanpham['MaSP'],'shop');
          }
      } else {
        echo '<p class="empty">Không có sản phẩm phù hợp theo yêu cầu</p>';
      }
    
         ?>
      </div>
    </div>
    </section>

    <section id="pagination" class="section-p1">
      <?php
      if(isset($_GET['MaDM']))
      {
        pagination('shop.php',$total,$page,'&MaDM=',$_GET['MaDM']);
      }
      else if(isset($_GET['category']) !='' && isset($_GET['gender']) !='' && isset($_GET['price']) !='')
      {
        paginationFilterBar($total, $page,'&category=', $_GET['category'],'&gender=', $_GET['gender'],'&price=', $_GET['price']);
      }
      elseif(isset($_GET['category']) !='' && isset($_GET['gender']) !='')
      {
        paginationFilterBar($total, $page,'&category=', $_GET['category'], '&gender=', $_GET['gender'],'','');
      }
      elseif(isset($_GET['category']) !='' && isset($_GET['price']) !='')
      {
        paginationFilterBar($total, $page,'&category=', $_GET['category'],'', '','&price=', $_GET['price']);
      }
      elseif(isset($_GET['price']) !='' && isset($_GET['gender']) !='')
      {
        paginationFilterBar($total, $page,'','','&gender=', $_GET['gender'],'&price=', $_GET['price']);
      }
      elseif(isset($_GET['category']) !='')
      {
        paginationFilterBar($total, $page,'&category=', $_GET['category'],'','','','');
      }
      elseif(isset($_GET['gender']) !='')
      {
        paginationFilterBar($total, $page,'', '','&gender=', $_GET['gender'],'', '');
      }
      elseif(isset($_GET['price']) !='')
      {
        paginationFilterBar($total, $page,'','','', '','&price=', $_GET['price']);
      }
      else
      {
        pagination('shop.php',$total,$page,'','');
      }
       ?>
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

    