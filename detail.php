<?php require_once '../bstory/templates/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <?php
      $query = "SELECT * FROM story WHERE story_id = {$_GET['id']}";
      $resultDetail = $mysqli->query($query);
      while ($arDetail = mysqli_fetch_assoc($resultDetail)) {
      ?>
        <script type="text/javascript">
          document.title = '<?php echo $arDetail['name'] ?>';
        </script>
        <h1><?php echo $arDetail['name'] ?></h1>
        <div class="clr"></div>
        <p>Ngày đăng: <?php echo $arDetail['created_at'] ?>. Lượt đọc: <?php echo $arDetail['counter'] ?></p>
        <div class="vnecontent">
          <p><?php echo $arDetail['detail_text'] ?></p>
        </div>
    </div>
  <?php
      }
  ?>
  <div class="article">
    <?php
    $query2 = "SELECT * FROM story WHERE cat_id = {$_GET['cid']} LIMIT 3";
    $resultLienquan = $mysqli->query($query2);
    while ($arLienquan = mysqli_fetch_assoc($resultLienquan)) {
      $cat_id = $arLienquan['cat_id'];
      $story_id = $arLienquan['story_id'];
      $name = $arLienquan['name'];
      $replacename = utf8ToLatin($name);
      $url = $replacename . '-' . $story_id . '-' . $cat_id . '.html';
    ?>
      <h2><span>3</span> Truyện liên quan</h2>
      <div class="clr"></div>
      <div class="comment"> <a href="detail.php?id=<?php echo $arLienquan['story_id'] ?>"><img src="files/uploads/<?php echo $arLienquan['picture'] ?>" width="40" height="40" alt="" class="userpic" /></a>
        <h3><a href="<?php echo $url?>" title=""><?php echo $arLienquan['name'] ?></a></h3>
        <p><?php echo $arLienquan['preview_text'] ?></p>
      </div>
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