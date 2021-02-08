<?php
include "db.php";
if(!isset($_SESSION["userid"]))
{

header("location:login.php");
}

settype($_POST['impression_id'],"integer");
$filtered = array(
  'impression_id'=>mysqli_real_escape_string($conn, $_POST['impression_id']),
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'impression'=>mysqli_real_escape_string($conn, $_POST['impression'])
);

$now = date("Y-m-d H:i:s");

$sql = "
  UPDATE all_impression
    SET
      title = '{$filtered['title']}',
      impression = '{$filtered['impression']}',
      updated = '{$now}'
    WHERE
      impression_id = '{$filtered['impression_id']}'
";

$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
    $finish = '<h2>변경실패. 관리자에게 보고</h2>';
} else {
  $finish = '
  <h2>변경 완료</h2>
  <p>
  <form action="server.php" method="post">
    <input type ="hidden" value = "'.$_POST['picname'].'" name = "picname">
    <input type ="submit" value = "돌아가기">
  </form>
  </p>
  '
  ;
}

?>

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
                  <?=$finish?>
                </header>
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
