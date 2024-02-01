<?php
    function buildProductCardCart($url, $name, $price, $size,$quantity,$quantitymax, $MaSP, $thanhtien)
    {
      return '<tr>
      <td><a href="./controllers/cartitem.ctl.php?MaSP='.$MaSP.'"><i class="fa-regular fa-circle-xmark"></i></a></td>
      <td id="td-link" onclick="window.location.href=\'detail.php?id='.$MaSP.'\';"><img src="'.$url.'" alt="" /></td>
      <td>'.$name.'</td>
      <td>'.$price.'</td>
      <td>
        <input type="number" min="1" value="'.$quantity.'" max="'.$quantitymax.'" readonly/>
      </td>
      <td>'.$size.'</td>
      <td>'.number_format($thanhtien).' VNĐ</td>
    </tr>';
    }

    function buildProductCardCartSession($url, $name, $price, $size,$quantity,$quantitymax, $MaSP, $thanhtien)
    {
      return '<tr>
      <td><a href="./controllers/cartitemsession.ctl.php?MaSP='.$MaSP.'"><i class="fa-regular fa-circle-xmark"></i></a></td>
      <td id="td-link" onclick="window.location.href=\'detail.php?id='.$MaSP.'\';"><img src="'.$url.'" alt="" /></td>
      <td>'.$name.'</td>
      <td>'.$price.'</td>
      <td><input type="number" min="1" value="'.$quantity.'" max="'.$quantitymax.'" readonly/></td>
      <td>'.$size.'</td>
      <td>'.number_format($thanhtien).' VNĐ</td>
    </tr>';
    }
?>


<section id="page-header" class="about-header">
    <h2>GIỎ HÀNG</h2>
    <p>Thêm mã phiếu giảm giá của bạn và tiết kiệm tới 70%!</p>
</section>

<section id="cart" class="section-p1">
      <table>
        <thead>
          <tr>
            <td>XÓA</td>
            <td>HÌNH ẢNH</td>
            <td>SẢN PHẨM</td>
            <td>ĐƠN GIÁ</td>
            <td>SỐ LƯỢNG</td>
            <td>KÍCH THƯỚC</td>
            <td>TỔNG TIỀN</td>
          </tr>
        </thead>
        <tbody>
          <?php
          if(isset($_SESSION['user']))
          {
              if(!empty($sanphams) )
              {
                  foreach($sanphams as $sanpham)
                  {
                      echo buildProductCardCart($sanpham->getUrl(), $sanpham->getTenSP(), number_format($sanpham->getDonGia())
                      , $sanpham->getKichThuoc(),$sanpham->getSoLuong() ,$sanpham->getSoLuongToiDa(), $sanpham->getMaSP(),intval($sanpham->getSoLuong()) * intval($sanpham->getDonGia()));
                  }
              }
          }
          elseif (!isset($_SESSION['user']) )
          {
              if(isset($_SESSION['productnotlogin']) && !empty($_SESSION['productnotlogin']))
              {
                foreach ($_SESSION['productnotlogin'] as $sanpham) {

                  echo buildProductCardCartSession($sanpham->getUrl(), $sanpham->getTenSP(), 
                  number_format($sanpham->getDonGia()), $sanpham->getKichThuoc(), $sanpham->getSoLuong(), $sanpham->getSoLuongLon(), $sanpham->getMaSP(), intval( $sanpham->getSoLuong()) * intval($sanpham->getDonGia()));
                }
              }
          }
          ?>
        </tbody>
      </table>
</section>

    <section id="tb">
    <?php

      if(!isset($_SESSION['user']) && empty($_SESSION['productnotlogin']))
        {
          echo '<p class="empty">Giỏ hàng của bạn đang trống</p>';
        }

      if(isset($_SESSION['user']) && empty($sanphams))
        { 
            echo '<p class="empty">Giỏ hàng của bạn đang trống</p>';
        }
      ?>
    </section>

    <section id="cart-add" class="section-p1">
      <form id="subtotal">
        <h3>GIỎ HÀNG</h3>
        <table>
          <tr>
            <td>Thành Tiền</td>
            <td>
            <?php
                $tongtien =0;
                if(isset($_SESSION['user']))
                {
                  if(!empty($sanphams) )
                    {
                      $tongtien =0;
                      foreach($sanphams as $sanpham)
                      {
                        $tongtien+= intval($sanpham->getSoLuong()) * intval($sanpham->getDonGia()) ;
                      }
                    }
                }
                elseif(!isset($_SESSION['user']))
                {
                  if(isset($_SESSION['productnotlogin']) && !empty($_SESSION['productnotlogin']))
                    {
                      foreach ($_SESSION['productnotlogin'] as $sanpham) {
                        $tongtien+= intval($sanpham->getSoLuong()) * intval($sanpham->getDonGia());
                      }
                    }
                }
                
                echo number_format($tongtien);
            ?> VNĐ
            </td>
          </tr>
          <tr>
            <td>Phí Vận Chuyển</td>
            <td>Miễn Phí</td>
          </tr>
          <tr>
            <td><strong>Tổng Tiền</strong></td>
            <td><strong>
            <?php
                $tongtien =0;
                if(isset($_SESSION['user']))
                {
                    if(!empty($sanphams) )
                    {
                        $tongtien =0;
                        foreach($sanphams as $sanpham)
                        {
                            $tongtien+= intval($sanpham->getSoLuong()) * intval($sanpham->getDonGia()) ;
                        }
                    }
                }
                elseif(!isset($_SESSION['user']))
                {
                  if(isset($_SESSION['productnotlogin']) && !empty($_SESSION['productnotlogin']))
                    {
                      foreach ($_SESSION['productnotlogin'] as $sanpham) {
                        $tongtien+= intval($sanpham->getSoLuong()) * intval($sanpham->getDonGia());
                      }
                    }
                }

                echo number_format($tongtien);
            ?> VNĐ
            </strong></td>
          </tr>
        </table>
        <button class="normal">
          <?php
          if(isset($_SESSION['user']) && $count >0)
          {
            echo  '<a href="order.php?MaKH='.$_SESSION['user']['MaKH'].'&MaGH='.$MaGH['MaGH'].'">ĐẶT HÀNG</a>';
          }
          elseif(!isset($_SESSION['user']) && isset($_SESSION['productnotlogin']) && !empty($_SESSION['productnotlogin']))
          {
            echo  '<a href="cart.php?msg=login-invaild">ĐẶT HÀNG</a>';
          }
          else
          {
            echo 'ĐẶT HÀNG';
          }
          ?>
        
        </button>
      </form>
    </section>