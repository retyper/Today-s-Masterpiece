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
<!--Today는 매일 같은 시간에 새그림으로 바뀌어야함. 지금으로선 이게 제일 큰 벽인듯..?
저장 안하면 뭐 데이터 없는거지. 알람은 계속 띄워주고. -->
  <body>

    <?php
    $revealedpics = scandir("data");
    $revealedpics = addjpg($revealedpics);

    $allpics = [];
    $allpics = allpicturelist($allpics);

    $unrevealedpics = array_diff($allpics, $revealedpics);
    $unrevealedpics = array_values($unrevealedpics); //아직 안본 그림 목록임. 무작위 추출한다음 위치만 얻어내면 끝

    $select = array_rand($unrevealedpics);//이제 이게 하루에 한번만 실행하는 함수가 되어야 함.
    $todaypic = $unrevealedpics[$select];
    $todaypic = erasejpg($todaypic);
    $todaypicloca = location_as_filename($todaypic);
    ?>

    <h3><a href="index.php">home</a></h3>
    <div class="pic"><!--매일 다른파일어어야함. 가진 목록중에 없는거로! -->
      <a href="<?=$todaypicloca?>"><img id="mainpic" src="<?=$todaypicloca?>" alt="그림을 찾을수 없습니다."></a>
      <h1><?=$todaypic?></h1>

    </div>

    <div class="impression">
      <form action="today_save.php" method="post">
        <input type = "hidden" value = "<?=$todaypic?>" name = picname>
        <textarea id="review" name="review" rows="10" cols="100" placeholder="당신의 감상을 작성해보세요."></textarea>
        <br><br>
        <input type="submit" value="저장">
      </form>
    </div>

<!--<h1>image 액자이미지 위에 있어야 함. 가운데로. 클릭하면 이미지만 보여야함</h1>
<br>
오른쪽에 이름표클래스. 클릭하면 설명창 뜸.<br>
<div>
  impression 입력받는창. 저장버튼 필요. 데이터베이스로 업로드.<br>
  다른 사람들 의견 보기 버튼 <br>

</div>
-->

  </body>
</html>
