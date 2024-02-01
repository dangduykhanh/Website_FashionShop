<?php
require_once('modules/pagination.php');
require_once('modules/productcard.php')
?>
<section class="search-form">

   <form action="./controllers/searchForm.ctl.php" method="POST">
      <input type="text" class="box" name="search_box" placeholder="Nhập tên sản phẩm...">
      <input type="submit" value="Tìm Kiếm" class="btn">
   </form>

</section>

<section div id="product-search" class="section-p1">
  
      <div class="pro-containersearch">
        <?php
        if(!isset($_GET['searchname']))
        {
          echo '<p class="empty">Bạn chưa tìm kiếm sản phẩm</p>';
        }

        if(isset($_GET['searchname']))
        {
            foreach($sanphamsearch as $sanpham)
            {
              echo buildProductCard($sanpham['Url'],$sanpham['TenSP'],number_format($sanpham['DonGiaBan']),$sanpham['MaSP'],'search');
            }
        }
        ?>
      </div>
</section>

<section id="pagination" class="section-p1">
      <?php
      
      if(isset($_GET['searchname']))
      {
        pagination('search.php',$total,$page,'&searchname=',$_GET['searchname']);
      }
      ?>
</section>