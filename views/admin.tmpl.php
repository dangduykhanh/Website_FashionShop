<section class="dashboard section-p1">

   <h2 class="title">BẢNG THỐNG KÊ</h2>

   <div class="box-container">

    <div class="box">
        <p>Doanh thu bán hàng tháng <?php echo date('m')?></p>
        <h3><?php echo number_format($doanhthu); ?> VNĐ</h3>
    </div>

    <div class="box">
      <p>Đơn hàng đang xử lý</p>
      <h3><?php echo $donhangxuly; ?> đơn</h3>
    </div>

    <div class="box">
      <p>Đơn hàng đã hoàn thành</p>
      <h3><?php echo $donhanghoanthanh; ?> đơn</h3>
    </div>

    <div class="box">
      <p>Sản phẩm còn hàng tồn kho</p>
      <h3><?php echo $sanphamcontonkho; ?> sản phẩm</h3>
    </div>

    <div class="box">
      <p>Sản phẩm hết hàng tồn kho</p>
      <h3><?php echo $sanphamhettonkho; ?> sản phẩm</h3>
    </div>

    <div class="box">
      <p>Tài khoản khách hàng</p>
      <h3><?php echo $qlkhachhang; ?> tài khoản</h3>
    </div>

    <div class="box">
      <p>Góp ý khách hàng</p>
      <h3><?php echo $qlgopy; ?> góp ý</h3>
    </div>

   </div>

</section>