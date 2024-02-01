<section class="update-product section-p1">

   <h2 class="title">Cập Nhật sản phẩm</h2>   

   <form action="./controllers/updateproductitem.ctl.php" method="post" enctype="multipart/form-data">

      <img src="<?php echo $anhbia; ?>" alt="">
      
      
      <div class="flex">
         <div class="inputBox">
            <select name="category" class="box" disabled>
               <?php echo '<option value="'.$danhmuc->getMaDM().'" selected>'.$danhmuc->getTenDM().'</option>'; ?>
            </select>

            <input type="hidden" name="thumbnail" value="<?php echo $anhbia; ?>">
            <input type="hidden" name="category" value="<?php echo $danhmuc->getTenDM(); ?>">

            <input type="hidden" name="idproduct" value="<?php echo $sanpham->getMaSP(); ?>">
            <input type="text" name="nameproduct" placeholder="Tên sản phẩm" class="box" value="<?php echo $sanpham->getTenSP(); ?>" required >
            <input type="number" name="pricein" min="0" step="10000" placeholder="Giá nhập" required class="box" value="<?php echo $sanpham->getDonGiaNhap(); ?>">
            <input type="number" name="priceout" min="0" step="10000" placeholder="Giá bán" required class="box" value="<?php echo $sanpham->getDonGiaBan(); ?>">
            <input type="text" name="gender" placeholder="Giới Tính" required class="box" value="<?php echo $sanpham->getGioiTinh(); ?>"> 
            
            <?php
             if(!empty($hinhanh))
             {
               foreach ($hinhanh as $key => $ha) {
                  if($ha->getCoPhaiAnhBia()==1)
                  {
                     echo '<input type="hidden" id="hiddenInput'.($key+1).'" name="hiddenimage'.($key+1).'" value="'.$ha->getUrl().'">';
                  }
                  else
                  {
                     echo '<input type="hidden" id="hiddenInput'.($key+1).'" name="hiddenimage'.($key+1).'" value="'.$ha->getUrl().'">';
                  }
               }
             }
             ?>
             <label for="fileInput1">Ảnh bìa</label>
            <input type="file" id="fileInput1" name="image1" class="box" placeholder="Ảnh bìa" accept="image/jpg, image/jpeg, image/png">

            <label for="fileInput2">Ảnh 2</label>
            <input type="file" id="fileInput2" name="image2" class="box" placeholder="Ảnh 2" accept="image/jpg, image/jpeg, image/png">
         </div>

         <div class="inputBox">
            <?php
               foreach ($soluong as $key => $sl) {
                  foreach ($kichthuoc as $kt) {
                     if($sl->getMaKT() == $kt->getMaKT())
                     {
                        echo '<input type="text" name="size'.($key+1).'" placeholder="size '.$kt->getTenKT().'" required class="box" value="'.$sl->getSoLuong().'">';
                     }
                  }
               }
            ?>
            <label for="fileInput3">Ảnh 3</label>
            <input type="file" id="fileInput3" name="image3" class="box" placeholder="Ảnh 3" accept="image/jpg, image/jpeg, image/png">
         </div>
      </div>
      <textarea name="details" placeholder="Mô tả sản phẩm" class="box" cols="30" rows="10" required>
         <?php echo $sanpham->getMoTa(); ?>
      </textarea>

      <div class="flex-btn">
      <input type="submit" class="btn" value="Cập nhật" name="update_product">
      <a href="productadmin.php" class="btn" class="option-btn">Quay lại</a>
      </div>
   
   </form>

</section>

<script>
// Lắng nghe sự kiện khi tệp được chọn trong thẻ input type="file
document.getElementById("fileInput1").addEventListener("change", function() {
    var filePath = this.value; // Lấy đường dẫn đến tệp từ thẻ input type=file
    var fileName = filePath.split("\\").pop(); //lấy file từ đường dẫn
    document.getElementById("hiddenInput1").value = fileName; // Cập nhật đường dẫn vào thẻ input type=hidden
});

document.getElementById("fileInput2").addEventListener("change", function() {
    var filePath = this.value;
    var fileName = filePath.split("\\").pop();
    document.getElementById("hiddenInput2").value = fileName;
});

document.getElementById("fileInput3").addEventListener("change", function() {
    var filePath = this.value;
    var fileName = filePath.split("\\").pop();
    document.getElementById("hiddenInput3").value = fileName;
});
</script>
