<?php
require_once('modules/productcard.php');
require_once('modules/helpers.php');
?>

<section class="favorite">
   <h2 >Sản Phẩm Yêu Thích</h2>

   <div class="box-container">
        <?php

           if(isset($_SESSION['user']))
            {
                $quantitymax = $_POST['QuantitydetailMax']?? "";

                if(!empty($sanphams) )
                {
                    foreach($sanphams as $sanpham)
                    {
                        echo buildProductCardFavorite($sanpham->getUrl(), $sanpham->getTenSP(), number_format($sanpham->getDonGia())
                        , $sanpham->getKichThuoc(),$sanpham->getMaSP(), $quantitymax);
                    }
                }

                if(empty($emti))
                { 
                    echo '<p class="empty">Bạn chưa có sản phẩm yêu thích</p>';
                }
            }
            else
            {
                echo '<p class="empty">Bạn chưa có sản phẩm yêu thích</p>';
            }
        ?>
    </div>
</section>