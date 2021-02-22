<?php
    include "db.php";
if(!isset($_SESSION["userid"]))
{

header("location:login.php");
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>오늘의 명화</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <link href="css/lightbox.min.css" rel="stylesheet" />
    <script src="js/jquery-1.7.2.min.js"></script>

  </head>
	<body class="subpage">

    <!-- Header -->
      <header id="header">
        <div class="logo"><a href="index.php">Today's Masterpiece</a></div>
        <a href="#menu">Menu</a>
      </header>

    <!-- Nav -->
      <nav id="menu">
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <li><a href="record.php">My collection</a></li>
          <li><a href="logout.php">로그아웃</a></li>
        </ul>
      </nav>

    <!-- 1 -->
      <section id="main" class="container">

        <div class="image fit">
          <a href="<?=$_POST['picture_path']?>" data-lightbox="<?=$_POST['picture_name']?>" data-title="<?=$_POST['picture_name']?>"><img src="<?=$_POST['picture_path']?>" alt="그림을 찾을수 없습니다."></a>
        </div>

        <hr/>

        <div class="inner">
          <div class="box">
            <div class="content">
              <header class="align-center">
                <h2 style="margin-bottom: 0px;"><?=$_POST['picture_name']?></h2><p></p>
                <h3><?=$_POST['author']?>, <?=$_POST['info']?></h3>

              </header>
              <div class="12u$">
                <form action="update.php" method="post" class="align-center" >
                  <input type = "hidden" value = "<?=$_POST['picture_id']?>" name = "picture_id">
                  <input type = "hidden" value = "<?=$_POST['picture_name']?>" name = "picture_name">
                  <input type = "hidden" value = "<?=$_POST['picture_path']?>" name = "picture_path">
                  <input type = "hidden" value = "<?=$_POST['impression']?>" name = "impression">
                  <input type = "hidden" value = "<?=$_POST['author']?>" name = "author">
                  <input type = "hidden" value = "<?=$_POST['info']?>" name = "info">
                  <br><br>
                  <p>
                  <?=$_POST['impression']?>
                  </p>
                  <br><br>
                  <input type="submit" value="수정">
                </form>
              </div>
              <p>
              <form action="server.php" method="post" class="align-center">
                <input type ="hidden" value = "<?=$_POST['picture_name']?>" name = "picname">
                <input type ="submit" value = "감상 나누러 가기">
              </form>
              </p>
            </div>
          </div>
        </div>
      </section>

<!--<h1>image 액자이미지 위에 있어야 함. 가운데로. 클릭하면 이미지만 보여야함</h1>
<br>
오른쪽에 이름표클래스. 클릭하면 설명창 뜸.<br>
<div>
  impression 입력받는창. 저장버튼 필요. 데이터베이스로 업로드.<br>
  다른 사람들 의견 보기 버튼 <br>

</div>
-->

<!-- Footer -->
<footer id="footer">
  <div class="container">
    <ul class="icons">
      <li><a href="https://twitter.com/?lang=ko" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
      <li><a href="https://ko-kr.facebook.com/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
      <li><a href="https://www.instagram.com/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
    </ul>
  </div>
  <div class="copyright">
    &copy; Untitled. All rights reserved.
  </div>
</footer>

<!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.scrollex.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="js/lightbox.min.js"></script>

</body>
</html>
