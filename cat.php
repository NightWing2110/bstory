<?php include_once '../bstory/templates/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <?php
    $queryCat = "SELECT name FROM cat WHERE cat_id = {$_GET['cat_id']}";
    $resultCat = $mysqli->query($queryCat);
    $arCat = mysqli_fetch_assoc($resultCat);
    ?>
    <script type="text/javascript">
      document.title = '<?php echo $arCat['name'] ?>';
    </script>
    <h1><?php echo $arCat['name'] ?></h1>
    <?php
    $query = "SELECT * FROM story WHERE cat_id = {$_GET['cat_id']} ORDER BY cat_id DESC";
    $result = $mysqli->query($query);
    while ($arStory = mysqli_fetch_assoc($result)) {
      $story_id = $arStory['story_id'];
      $name = $arStory['name'];
      $cat_id = $arStory['cat_id'];
      $replaceName = utf8ToLatin($name);
      $url = $replaceName . '-' . $story_id . '-' . $cat_id . '.html';
    ?>
      <div class="article">
        <h2><?php echo $arStory['name'] ?></h2>
        <p class="infopost"><?php echo $arStory['created_at'] ?></p>
        <div class="clr"></div>
        <div class="img"><img src="files/uploads/<?php echo $arStory['picture'] ?>" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
          <p><?php echo $arStory['preview_text'] ?></p>
          <p class="spec"><a href="<?php echo $url?>" class="rm">Chi tiết</a></p>
        </div>
        <div class="clr"></div>
      </div>
    <?php
    }
    ?>
  </div>
  <div class="sidebar">
    <?php include_once '../bstory/templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once '../bstory/templates/bstory/inc/footer.php'; ?>