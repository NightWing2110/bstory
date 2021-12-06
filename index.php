<?php include_once '../bstory/templates/bstory/inc/header.php'; ?>
<div class="content_resize">
  <?php
  $row_count = 5;
  $query1 = mysqli_query($mysqli, "SELECT * FROM story");
  $tongsodong = mysqli_num_rows($query1);
  $sotrang = ceil($tongsodong / $row_count);
  if (isset($_GET['page'])) {
    $curent_page = $_GET['page'];
  } else {
    $curent_page = 1;
  }
  $offset = ($curent_page - 1) * $row_count;
  ?>
  <div class="mainbar">
    <form method="post" action="">
      <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
      <input type="search" name="timkiem" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
      <div style="clear:both"></div>
    </form><br />
    <?php
    if (isset($_POST['search'])) {
      $search = $_POST['timkiem'];
    } else {
      $search = '';
    }
    $query = "SELECT * FROM story WHERE story.name LIKE '%$search%' LIMIT $offset,$row_count";
    $result = $mysqli->query($query);
    while ($arST = mysqli_fetch_assoc($result)) {
      $cat_id = $arST['cat_id'];
      $story_id = $arST['story_id'];
      $name = $arST['name'];
      $Replacename = utf8ToLatin($name);
      $url = $Replacename . '-' . $story_id . '-' . $cat_id . '.html';
    ?>
      <div class="article">
        <h2><?php echo $arST['name'] ?></h2>
        <p class="infopost"><?php echo $arST['created_at'] ?></p>
        <div class="clr"></div>
        <div class="img"><img src="files/uploads/<?php echo $arST['picture'] ?>" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
          <p><?php echo $arST['preview_text'] ?></p>
          <p class="spec"><a href="<?php echo $url ?>" class="rm">Chi tiết</a></p>
        </div>
        <div class="clr"></div>
      </div>
    <?php
    }
    ?>
    <div class="phantrang">
      <?php
      for ($i = 1; $i <= $sotrang; $i++) {
        $active = '';
        if ($i == $curent_page) {
          $active = 'active';
        }
      ?>
        <a style="text-align: right;" href="index.php?page=<?php echo $i ?>"><?php echo 'Trang' . $i ?></a>
      <?php
      }
      ?>

    </div>
  </div>
  <div class="sidebar">
    <?php include_once '../bstory/templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once '../bstory/templates/bstory/inc/footer.php'; ?>