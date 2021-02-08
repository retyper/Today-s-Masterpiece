<?php
    include "db.php";
if(!isset($_SESSION["userid"]))
{

header("location:login.php");
}


$myid = $_SESSION['audience_id'];

$sql = "SELECT * FROM my_impression WHERE audience_id = '$myid'";
$result = mysqli_query($conn,$sql);

$haslist = [];

while($row = mysqli_fetch_array($result)){
  $rowarray = array($row['picture_id']);
  $haslist = array_merge($haslist,$rowarray);
}

$haslist = implode(',', $haslist);
$sql = "SELECT * FROM picture WHERE picture_id NOT IN ({$haslist})";
if(empty($haslist)){
  $sql = "SELECT * FROM picture";
}
$result = mysqli_query($conn,$sql);
$ids = [];
$picnames = [];
$picpaths = [];
$authors = [];
$info = [];

while($row = mysqli_fetch_array($result)){
  $arr1 = array($row['picture_id']);
  $arr2 = array($row['picture_name']);
  $arr3 = array($row['picture_path']);
  $arr4 = array($row['author']);
  $arr5 = array($row['info']);
  $ids = array_merge($ids,$arr1);
  $picnames = array_merge($picnames,$arr2);
  $picpaths = array_merge($picpaths,$arr3);
  $authors = array_merge($authors,$arr4);
  $info = array_merge($info,$arr5);
}

$select = array_rand($ids);
$todayid = $ids[$select];
$todayname = $picnames[$select];
$todaypath = $picpaths[$select];
$todayauthor = $authors[$select];
$todayinfo = $info[$select];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Today's Masterpiece</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <link href="css/lightbox.css" rel="stylesheet" />
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/lightbox.js"></script>
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
                <a href="<?=$todaypath?>" rel="lightbox"><img src="<?=$todaypath?>" alt="그림을 찾을수 없습니다."></a>
              </div>

          <hr/>
          <form action="today.php" class="align-center" method="post">
            <input type="submit" value="다른 그림으로 바꾸기">
          </form>
          <div class="inner">
            <div class="box">
              <div class="content">
                <header class="align-center">
                  <h2 style="margin-bottom: 0px;"><?=$todayname?></h2><p></p>
                  <h3><?=$todayauthor?>, <?=$todayinfo?></h3>

                </header>
                <div class="12u$">
                  <form action="today_save.php" method="post" class="align-center" >
                    <input type = "hidden" value = "<?=$myid?>" name = audience_id>
                    <input type = "hidden" value = "<?=$todayid?>" name = picture_id>
                    <textarea name="impression" rows="10" cols="100" placeholder="당신의 감상을 작성해보세요."></textarea>
                    <br><br>
                    <input type="submit" value="저장">
                  </form>
                </div>
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
