<?php
require_once('./lib/myfunc.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Today's Masterpiece</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <body>
    <h3><a href="index.php">home</a></h3>
    <div>
      <?php //아이거 저장 순서대로 sorting 해야 할거같은데... 일단 나중에 생각해야할듯
      $picname = scandir("data");
      $each_picname = [];
      $each_imgloca = [];
      $i = 0;
      while ($i<count($picname)) {
        if ($picname[$i] != '.' && $picname[$i] != '..') {
            $imgloca = location_as_filename($picname[$i]);
              array_push($each_picname, $picname[$i]);
              array_push($each_imgloca, $imgloca);
        }
        $i = $i + 1;
      }
      ?>
    </div>
    <div>
      <?php
      $i = 0;
      while ($i<count($each_picname)) {//업데이트 말고 check?로 가게 만들고 check 에서 update 버튼 누르면 update 가도록 하자. check 에 그림 정보 추가하자.
        ?>
        <form action="read.php" method="post" style="display: contents;">
            <input type="hidden" name="picname" value="<?=$each_picname[$i]?>">
            <input type="hidden" name="imgloca" value="<?=$each_imgloca[$i]?>">
            <input type="image" id="collection" src="<?=$each_imgloca[$i]?>" alt="그림을 찾을수 없습니다.">
        </form>
        <?php
        $i = $i+1;
      }
      ?>
    </div>
<!--<h1>image 액자이미지 위에 있어야 함. 가운데로. 클릭하면 이미지만 보여야함</h1>
<br>
오른쪽에 이름표클래스. 클릭하면 설명창 뜸.<br>
-->

  </body>
</html>
