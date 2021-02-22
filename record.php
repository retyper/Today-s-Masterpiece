<?php
    include "db.php";
    if(!isset($_SESSION["userid"]))
    {

    header("location:login.php");
    }



$myid = $_SESSION['audience_id'];

$sql = "SELECT * FROM my_impression LEFT JOIN picture ON my_impression.picture_id = picture.picture_id WHERE audience_id = '$myid'";
$result = mysqli_query($conn,$sql);
$list = '';

while($row = mysqli_fetch_array($result)){
  $list = $list.'
  <form action="read.php" method="post">
      <input type="hidden" name="picture_id" value="'.$row['picture_id'].'">
      <input type="hidden" name="picture_name" value="'.$row['picture_name'].'">
      <input type="hidden" name="picture_path" value="'.$row['picture_path'].'">
      <input type="hidden" name="impression" value="'.$row['impression'].'">
      <input type="hidden" name="author" value="'.$row['author'].'">
      <input type="hidden" name="info" value="'.$row['info'].'">
      <input type="image" class="image fit" src="'.$row['picture_path'].'" alt="그림을 찾을수 없습니다.">
  </form>
  ';
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
    <script data-ad-client="ca-pub-2507172034605671" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
        <div class="inner">
          <header class="align-center">
            <p class="special">나의 감상목록</p>
            <h2>My collection</h2>
					</header>
          <div class="gallery">
            <?=$list?>
          </div>
        </div>
      </section>



<!--<h1>image 액자이미지 위에 있어야 함. 가운데로. 클릭하면 이미지만 보여야함</h1>
<br>
오른쪽에 이름표클래스. 클릭하면 설명창 뜸.<br>
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


</body>
</html>
