<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Today's Masterpiece</title>
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
                <form action="process_upload.php?=<?=$_POST['picname']?>" method="POST" class="align-center">
                  <input type="hidden" name="picname" value="<?=$_POST['picname']?>">
                  <input type="hidden" name="impression_id" value="<?=$_POST['impression_id']?>">
									<div class="12u$(xsmall)">
											<input type="text" name="title" placeholder="title">
									</div>
									<br>
                  <p><textarea name="impression" placeholder="당신의 감상을 작성해 보세요."></textarea></p>
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
