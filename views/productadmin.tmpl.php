<section class="add-products">

   <h2 class="title">Thêm sản phẩm mới</h2>

   <form action="./controllers/productadmin.ctl.php" method="POST" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <select id="categoryproductadmin"name="category" class="box" required>
                <option value="" selected disabled>Danh mục</option>
                <?php
                    if(!empty($dsdanhmuc))
                    {
                        foreach ($dsdanhmuc as $dm) {
                            echo '<option value="'.$dm->getMaDM().'">'.$dm->getTenDM().'</option>';
                        }
                    }
                ?>
            </select>

            <input type="text" name="nameproduct" class="box" required placeholder="Tên sản phẩm">
            <input type="number" min="0" name="pricein" class="box" required placeholder="Giá nhập">
            <input type="number" min="0" name="priceout" class="box" required placeholder="Đơn giá bán">
            
            <select name="gender" class="box" required>
                <option value="" selected disabled>Giới tính</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>

            <label>Ảnh bìa:</label>
            <input type="file" name="imagethumbnail" required class="box" accept="image/jpg, image/jpeg, image/png">
            <label>Ảnh 2:</label>
            <input type="file" name="image2" required class="box" accept="image/jpg, image/jpeg, image/png">
        </div>

         <div class="inputBox">
            
            <input type="number" min="0" name="size1" class="box Sizeinput" required placeholder="Size S">
            <input type="number" min="0" name="size2" class="box Sizeinput" required placeholder="Size M">
            <input type="number" min="0" name="size3" class="box Sizeinput" required placeholder="Size L">
            <input type="number" min="0" name="size4" class="box Sizeinput" required placeholder="Size XL">
            <input type="number" min="0" name="size5" class="box Sizeinput" required placeholder="Size XXL">

            <label>Ảnh 3:</label>
            <input type="file" name="image3" required class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
      </div>
      <textarea name="detailproduct" class="box" required placeholder="Mô tả sản phẩm" cols="30" rows="10"></textarea>
      <input type="submit" class="btn" value="THÊM SẢN PHẨM">
   </form>
</section>

<section class="show-products">

   <h1 class="title">quản lý sản phẩm</h1>

   <div class="box-container">

   <?php
        if(!empty($dsdanhmuc) && !empty($dssanpham) && !empty($dshinhanh))
        {
            foreach ($dssanpham as $sp) {
                echo '<form action="updateproduct.php" method="post" id="form">
            <div class="single-pro-image">';

                foreach ($dshinhanh as $ha) {
                    if($sp->getMaSP() == $ha->getMaSP())
                    {
                        if($ha->getCoPhaiAnhBia() == '1')
                        {
                            echo '<img src="'.$ha->getUrl().'" width="100%" id="MainImg" />
                            <input type="hidden" name="thumbnail" value="'.$ha->getUrl().'">';
                            break;
                        }
                    }
                }

            echo '<div class="small-img-group">
            <input type="hidden" name="idproduct" value="'.$sp->getMaSP().'">';
            
            foreach ($dshinhanh as $ha) {
                if($sp->getMaSP() == $ha->getMaSP())
                {
                    if($ha->getCoPhaiAnhBia() == 1 || $ha->getCoPhaiAnhBia() == 0)
                    {
                        echo '<div class="small-img-col"> <img src="'.$ha->getUrl().'" width="100%" class="small-img" alt="" /> </div>';
                    }
                }
            }
                echo '</div>
                    </div>
            <div class="single-pro-details">';

                foreach ($dsdanhmuc as $dm) {
                    if($dm->getMaDM() == $sp->getMaDM())
                    {
                        echo '<p>Danh mục: <span>'.$dm->getTenDM().'</span></p>
                        <input type="hidden" name="category" value="'.$dm->getTenDM().'">';
                    }
                }

            echo ' <p>Tên: <span>'.$sp->getTenSP().'</span></p>
            <p>Giá nhập: <span>'.number_format($sp->getDonGiaNhap()).' VNĐ</span></p>
            <p>Giá bán: <span>'.number_format($sp->getDonGiaBan()).' VNĐ</span></p>
            <p>Giới tính: <span>'.$sp->getGioiTinh().'</span></p>';
            
            
                foreach ($dssoluong as $sl) {
                    if($sp->getMaSP() == $sl->getMaSP())
                    {
                        foreach ($dskichthuoc as $kt) {
                            if($kt->getMaKT() == $sl->getMaKT())
                            {
                                echo '<p>Size '.$kt->getTenKT().': <span>'.$sl->getSoLuong().' cái</span></p>';
                            }
                        }
                    }
                }
            echo '<button class="normal" id="btn-update">cập nhật</button>
            <button class="normal" id="btn-delete"><a href="./controllers/productadmin.ctl.php?masp='.$sp->getMaSP().'">xóa</a></button>
            </div>
        </form>';
            }  
        }
   ?>
   </div>
</section>

<script>
    // js thay đổi kích thước phù hợp với danh mục

var selectcata = document.getElementById("categoryproductadmin");
var selectsize = document.getElementsByClassName("Sizeinput");

// Lắng nghe sự kiện khi giá trị trong selectcata thay đổi
selectcata.addEventListener("change", function () {
  var selectedOption = selectcata.options[selectcata.selectedIndex];
  var value = selectedOption.getAttribute("value");

  if (selectsize.length > 0) {
    if (value == "DM1" || value == "DM2") {
      selectsize[0].placeholder = "Size S";
      selectsize[1].placeholder = "Size M";
      selectsize[2].placeholder = "Size L";
      selectsize[3].placeholder = "Size XL";
      selectsize[4].placeholder = "Size XXL";
    } else if (value == "DM3") {
      selectsize[0].placeholder = "Size 38";
      selectsize[1].placeholder = "Size 39";
      selectsize[2].placeholder = "Size 40";
      selectsize[3].placeholder = "Size 41";
      selectsize[4].placeholder = "Size 42";
    }
  }
});
</script>