<div class="gadget">
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
    <?php
    $query = "SELECT * FROM cat";
    $result = $mysqli->query($query);
    while ($arCat = mysqli_fetch_assoc($result)) {
      $cat_id = $arCat['cat_id'];
      $name = $arCat['name'];
      $nameReplace = utf8ToLatin($name);
      $url = $nameReplace . '-' . $cat_id;
    ?>
      <li><a href="<?php echo $url?>"><?php echo $arCat['name'] ?></a></li>
    <?php
    }
    ?>
  </ul>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
    <?php
    $queryStory = "SELECT * FROM story ORDER BY story_id DESC LIMIT 10";
    $result2 = $mysqli->query($queryStory);
    while ($arStory = mysqli_fetch_assoc($result2)) {
      $Cat_id = $arStory['cat_id'];
      $Story_id = $arStory['story_id'];
      $Name = $arStory['name'];
      $Replacename = utf8ToLatin($Name);
      $url1 = $Replacename . '-' . $Story_id . '-' . $Cat_id . '.html';
    ?>
      <li><a href="<?php echo $url1?>"><?php echo $arStory['name'] ?></a><br></li>
    <?php
    }
    ?>
  </ul>
</div>