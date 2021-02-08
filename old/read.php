<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Today's Masterpiece</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <body>
    <h3><a href="index.php">home</a></h3>

    <div class="pic"><!--record 에서 전달된 주소 필요함..-->
      <a href="<?=$_POST['imgloca']?>"><img id="mainpic" src="<?=$_POST['imgloca']?>" alt="그림을 찾을수 없습니다."></a>
      <h1><?php echo $_POST['picname']?></h1>
    </div>

    <div class="impression">
      <form action="update.php" method="post">
        <input type = "hidden" value = "<?=$_POST['picname']?>" name = "picname">
        <input type = "hidden" value = "<?=$_POST['imgloca']?>" name = "imgloca">
        <p>
        <?php echo file_get_contents("data/".$_POST['picname']); ?>
        </p>
        <br><br>
        <input type="submit" value="수정">
      </form>
      <p>
      <form action="server.php" method="post">
        <input type ="hidden" value = "<?=$_POST['picname']?>" name = "picname">
        <input type ="submit" value = "감상 나누러 가기">
      </form>
      </p>
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
