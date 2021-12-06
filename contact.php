<?php include_once '../bstory/templates/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Liên hệ</span></h2>
      <div class="clr"></div>
      <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
    </div>
    <div class="article">
      <h2>Form liên hệ</h2>
      <div class="clr"></div>
      <?php
      if (isset($_POST['submit'])) {
        $error = array();
        if ($_POST['name']) {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $website = $_POST['website'];
          $content = $_POST['message'];
        } else {
          $error['name'] = "chưa nhập tên";
          $error['email'] = "Chưa nhập email";
        }
        if (empty($error)) {
          //B2: Viết câu lệnh truy vấn
          $queryContact = "INSERT INTO contact (name, email, website, content) VALUES ('{$name}','{$email}','{$website}','{$content}')";
          //B3: thêm dữ liệu vào database
          $resultContact = $mysqli->query($queryContact);
          //B4: thông báo kết quả
          if ($resultContact) {
            header("LOCATION:index.php?msg= Thêm liên lạc thành công!");
          } else {
            echo "Lỗi! Không thể thêm liên lạc";
          }
        }
      }
      ?>
      <form action="#" method="post" id="sendemail">
        <ol>
          <li>
            <label for="name">Họ tên (required)</label>
            <input id="name" name="name" class="text" />
            <?php echo isset($error['name']) ? $error['name'] : ''; ?>
          </li>
          <li>
            <label for="email">Email (required)</label>
            <input id="email" name="email" class="text" />
            <?php echo isset($error['email']) ? $error['email'] : ''; ?>
          </li>
          <li>
            <label for="website">Website</label>
            <input id="website" name="website" class="text" />
          </li>
          <li>
            <label for="message">Nội dung</label>
            <textarea id="message" name="message" rows="8" cols="50"></textarea>
          </li>
          <li>
            <button type="submit" name="submit" class="btn btn-success btn-md">Nộp</button>
            <div class="clr"></div>
          </li>
        </ol>
      </form>
    </div>
  </div>
  <div class="sidebar">
    <?php include_once '../bstory/templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once '../bstory/templates/bstory/inc/footer.php'; ?>