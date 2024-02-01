<section class="messages section-p1">

   <h2 class="title">QUẢN LÝ GÓP Ý</h2>

   <div class="box-container">

   <?php
        if(!empty($dsgopy))
        {
            foreach ($dsgopy as $gopy) {
                echo '<div class="box">
                <p> Mã góp ý : <span>'.$gopy->getMaGY().'</span> </p>
                <p> Họ và tên : <span>'.$gopy->getHovaTen().'</span> </p>
                <p> Email : <span>'.$gopy->getEmail().'</span> </p>
                <p> Tiêu đề : <span>'.$gopy->getTenGY().'</span> </p>
                <p> Nội dung : <span>'.$gopy->getNoiDungGY().'</span> </p>
                <a href="./controllers/feedbackitem.ctl.php?magy='.$gopy->getMaGY().'" class="delete-btn">XÓA GÓP Ý</a>
            </div>';
            }
        }
        else
        {
            echo '<p class="empty">Chưa có góp ý của khách hàng</p>';
        }
   ?>
   </div>

</section>