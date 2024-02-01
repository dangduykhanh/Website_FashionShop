<?php
require_once('modules/productcard.php');
?>

<section id="Hero">
      <h4>Trade-in-offer</h4>
      <h2>Super value deals</h2>
      <h1>On all products</h1>
      <p>save more with coupons & up to 70% off!</p>
      <button><a href="shop.php">Shop Now</a></button>
</section>

<section id="product1" class="section-p1">
  <h2>Featured Products</h2>
  <p>Summer Collection New Morden Design</p>
  <h4 id="category"><a href="shop.php?MaDM=DM1">Nike Shirt</a></h4>
      <div class="pro-container">
        <?php
        foreach($AoNams as $AoNam)
        {
          echo buildProductCard($AoNam['Url'], $AoNam['TenSP'], number_format($AoNam['DonGiaBan']),$AoNam['MaSP'],'');
        }

        foreach($AoNus as $AoNu)
        {
          echo buildProductCard($AoNu['Url'], $AoNu['TenSP'], number_format($AoNu['DonGiaBan']),$AoNu['MaSP'],'');
        }
        ?>
      </div>

  <h4 id="category"><a href="shop.php?MaDM=DM2">Nike Pants</a></h4>
      <div class="pro-container">
      <?php
      foreach($QuanNams as $QuanNam)
        {
          echo buildProductCard($QuanNam['Url'], $QuanNam['TenSP'], number_format($QuanNam['DonGiaBan']),$QuanNam['MaSP'],'');
        }

        foreach($QuanNus as $QuanNu)
        {
          echo buildProductCard($QuanNu['Url'], $QuanNu['TenSP'], number_format($QuanNu['DonGiaBan']),$QuanNu['MaSP'],'');
        }
        ?>
      </div>

      <h4 id="category"><a href="shop.php?MaDM=DM3">Nike Shoes</a></h4>
      <div class="pro-container">
      <?php
      foreach($GiayNams as $GiayNam)
        {
          echo buildProductCard($GiayNam['Url'], $GiayNam['TenSP'], number_format($GiayNam['DonGiaBan']),$GiayNam['MaSP'],'');
        }

        foreach($GiayNus as $GiayNu)
        {
          echo buildProductCard($GiayNu['Url'], $GiayNu['TenSP'], number_format($GiayNu['DonGiaBan']),$GiayNu['MaSP'],'');
        }
        ?>
      </div>
    </section>

    <section id="banner" class="section-m1">
      <h4>Repair Services</h4>
      <h2>Up to <span>70% off</span> - All t-shirts & Accessories</h2>
    </section>