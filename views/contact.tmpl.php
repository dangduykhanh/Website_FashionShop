<?php
  require_once('modules/helpers.php');
?>

<section id="page-header" class="about-header">
      <h2>#Let's_talk</h2>
      <p>Để lại góp ý, chúng tôi rất mong nhận được phản hồi từ bạn!</p>
    </section>

    <section id="contact-details" class="section-p1">
      <div class="details">
        <span>Liên Lạc</span>
        <h2>Hãy ghé thăm cửa hàng hoặc liên hệ với chúng tôi ngay hôm nay</h2>
        <h3>Cửa Hàng Chính</h3>
        <div>
          <li>
            <i class="fa-solid fa-map"></i>
            <p>50 Nguyễn văn Linh, Phường Tân Thuận Tây, Quận 7</p>
          </li>
          <li>
            <i class="fa-solid fa-envelope"></i>
            <p>Cara@gmail.com</p>
          </li>
          <li>
            <i class="fa-solid fa-phone"></i>
            <p>0347587031</p>
          </li>
          <li>
            <i class="fa-solid fa-clock"></i>
            <p>Thứ Hai đến Chủ Nhật: 9.00am đến 16.pm</p>
          </li>
        </div>
      </div>

      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.7597066116778!2d106.72432907460288!3d10.7529936596264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175258651d90f83%3A0x57e7802e45537710!2zNTAgxJAuIE5ndXnhu4VuIFbEg24gTGluaCwgVMOibiBUaHXhuq1uIFTDonksIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1691858024498!5m2!1svi!2s"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>

    <section id="form-details">
      <form action="./controllers/contact.ctl.php" method="post">
        <span>ĐỂ LẠI LỜI NHẮN</span>
        <h2>Chúng tôi luôn lắng nghe từ bạn</h2>

        <input type="text" placeholder="Nhập Họ Và Tên" name="name" 
        title="Họ và tên không dài hơn 256 ký tự" value="<?php echo getURLParameter('name'); ?>" required/>

        <input type="email" placeholder="Nhập Email" name="gmail" 
        title="Email phải có dạng abc@gmail.com và tối thiểu 13 ký tự" value="<?php echo getURLParameter('gmail'); ?>" required />

        <input type="text" placeholder="Nhập Tiêu Đề" name="title" 
        title="Tiêu đề không dài hơn 256 ký tự" value="<?php echo getURLParameter('title'); ?>" required/>

        <textarea
          name="message"
          id=""
          cols="30"
          rows="10"
          placeholder="Nhập Nội Dung"
          required
        ><?php echo getURLParameter('message'); ?></textarea>

        <button type="submit" class="normal">GÓP Ý</button>
      </form>
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