<?php
include "db.php";
if(!isset($_SESSION["userid"]))
{

header("location:login.php");
}

$filtered_id = mysqli_real_escape_string($conn, $_POST['impression_id']);
$sql = "SELECT * FROM all_impression WHERE all_impression.impression_id={$filtered_id}";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$article = array(
  'impression'=>htmlspecialchars($row['impression']),
  'title'=>htmlspecialchars($row['title'])
);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  			<section id="two" class="wrapper style2">
  				<div class="inner">
  					<div class="box">
  						<div class="content">
  							<header class="align-center">
  								<p>나의 감상</p>
  								<h2>Impressions for <?=$_POST['picname']?></h2>
  							</header>
                <form action="process_modify.php?=<?=$_POST['picname']?>" method="POST" class="align-center">
                  <input type="hidden" name="picname" value="<?=$_POST['picname']?>">
                  <input type="hidden" name="impression_id" value="<?=$_POST['impression_id']?>">
                  <div class="12u$(xsmall)">
                      <input type="text" name="title" value="<?=$article['title']?>" placeholder="title">
                  </div>
                  <br>
                  <p><textarea name="impression" placeholder="당신의 감상을 작성해 보세요."><?=$article['impression']?></textarea></p>
                  <p><input type="submit" value="저장"></p>
                </form>
  						</div>
  					</div>
  				</div>
  			</section>

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
