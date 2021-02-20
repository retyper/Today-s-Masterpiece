<!--이 페이지는 read.php 에서 그림 제목 변수를 받아 제목에 따른 감상 목록을 데이터베이스에서 불러온다.-->

<?php
include "db.php";
if(!isset($_SESSION["userid"]))
{
header("location:login.php");
}

$picname = $_POST['picname'];


//감상 리스트 불러오기 + 새로 작성/내글 보기 버튼
$sql = "SELECT * FROM all_impression WHERE picture_name='$picname' ORDER BY like_count DESC";
$result = mysqli_query($conn,$sql);
$list = '';

$upload_link ='<li>
 <form action = "upload.php?='.$_POST['picname'].'" method = "POST" >
   <input type = "hidden" value = "'.$_POST['picname'].'" name = "picname">
   <input type = "submit" value = "내 감상 작성하기" class="button special">
 </form>
 </li>
 ';

while($row = mysqli_fetch_array($result)){
  $seq = $row['impression_id'];
  $list = $list.'
  <tr>
    <td>'.$row['audience'].'</td>
    <td>
      <form action="server.php?='.$_POST['picname'].'" method = "post" style="margin-bottom: 0px;">
        <input type ="hidden" value = "'.$_POST['picname'].'" name = "picname">
        <input type ="hidden" value = "'.$seq.'" name = "impression_id">
        <input type ="submit" value = "'.$row['title'].'" class="button alt fit" style="margin-bottom: 0px;">
      </form>
    </td>
    <td>
      <button type="button" class="btn-like" data-article-id="'.$seq.'">
      <span class="heart-shape">♡</span>
      <span class="like-count">'.$row['like_count'].'</span>
      </button>
    </td>
  </tr>
  ';

  if($row['audience']===$_SESSION['userid']){
    $upload_link ='<li>
    <form action="server.php?='.$_POST['picname'].'" method = "post" >
      <input type ="hidden" value = "'.$_POST['picname'].'" name = "picname">
      <input type ="hidden" value = "'.$row['impression_id'].'" name = "impression_id">
      <input type ="submit" value = "나의 감상 다시보기" class="button special">
    </form>
    </li>
    ';
  }
}

$article = [
  'impression_id'=>'',
  'title'=>'',
  'impression'=>'',
  'writer'=>''
];
$modify_link = '';
$delete_link = '';
$writer = '';

if(isset($_POST['impression_id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_POST['impression_id']);
  $sql = "SELECT * FROM all_impression WHERE impression_id={$filtered_id}";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $article = array(
    'title'=>htmlspecialchars($row['title']),
    'impression'=>htmlspecialchars($row['impression']),
    'writer'=>htmlspecialchars($row['audience'])
  );

  $writer = "<p>by {$article['writer']}</p>";

  if($article['writer']===$_SESSION['userid']){
    $upload_link = '';
    $modify_link = '<li>
    <form action = "modify.php?='.$_POST['picname'].'" method = "post">
      <input type = "hidden" value = "'.$_POST['picname'].'" name = "picname">
      <input type = "hidden" value = "'.$_POST['impression_id'].'" name = "impression_id">
      <input type = "submit" value = "작성내용 수정하기" class="button special">
    </form>
    </li>
    ';
    $delete_link = '<li>
    <form action = "process_delete.php" method = "post" onsubmit="return confirm(\'정말로 삭제 하시겠습니까?\');" >
      <input type = "hidden" value = "'.$_POST['picname'].'" name = "picname">
      <input type = "hidden" value = "'.$_POST['impression_id'].'" name = "impression_id">
      <input type = "submit" value="내 감상 삭제하기" class="button">
    </form>
    </li>
    ';
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Today's Masterpiece</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
    .btn-like .heart-shape {
      display: inline;
      color: red;
    }
    .btn-like {
      display: none;
      border: none;
      background-color: inherit;
    }
    </style>
    <script type="text/javascript" src="js/phpex.js"></script>
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
  			<section id="two" class="wrapper style2">
  				<div class="inner">
  					<div class="box">
  						<div class="content">
  							<header class="align-center">
  								<p>Impressions for <?=$_POST['picname']?></p>
  								<h2><?=$article['title']?></h2>
  							</header>
  							<p><?=$article['impression']?></p>
                <?=$writer?>
  						</div>
  					</div>
            <div class="12u$">
              <ul class="actions">
                <?=$upload_link?>
                <?=$modify_link?>
                <?=$delete_link?>
              </ul>
            </div>

            <div class="table-wrapper">
              <table>
                <thead>
                  <tr>
                    <th>Audience</th>
                    <th>Impression</th>
                    <th>Like</th>
                  </tr>
                </thead>
                <tbody>
                  <?=$list?>
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>

            <hr />

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
