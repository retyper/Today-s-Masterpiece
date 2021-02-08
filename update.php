<!DOCTYPE html>
<html>
  <head>
    <title>Today's Masterpiece</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
  </head>
	<body class="subpage">

    <!-- Header -->
      <header id="header">
        <div class="logo"><a href="index.php">Today's Masterpiece <span>by Retyper</span></a></div>
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

          <div class="image fit"><!--record 에서 전달된 주소 필요함..-->
            <a href="<?=$_POST['picture_path']?>"><img id="mainpic" src="<?=$_POST['picture_path']?>" alt="그림을 찾을수 없습니다."></a>
          </div>

          <hr/>

          <div class="inner">
            <div class="box">
              <div class="content">

                <header class="align-center">
                  <h2 style="margin-bottom: 0px;"><?=$_POST['picture_name']?></h2><p></p>
                  <h3>maecenas sapien feugiat ex purus</h3>
                </header>

                <div class="12u$">
                  <form action="update_save.php" method="post" class="align-center" >
                    <input type = "hidden" value = "<?=$_POST['picture_id']?>" name = "picture_id">
                    <textarea id = "review" rows = "10" cols = "100" placeholder = "당신의 감상을 작성해보세요." name = "impression"><?=$_POST['impression']?></textarea>
                    <br><br>
                    <input type="submit" value="저장">
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


</body>
</html>
