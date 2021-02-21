<?php
    include "db.php";

$myid = $_SESSION['audience_id'];

$sql = "SELECT * FROM my_impression WHERE audience_id ='$myid' ORDER BY created DESC limit 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

date_default_timezone_set('Asia/Seoul');

if(isset($row['created'])){
  $now = strtotime(date("Y-m-d H:i:s"));
  $target_time = strtotime(date("08:00:00"));
  $lastcreated_time = strtotime($row['created']);
  $Y_target_time = $target_time - "86400";

  $today_link = '오늘의 명화 감상이 작성되었습니다!';

  if($now >= $target_time){
    if($lastcreated_time < $target_time){
    	$today_link = '<a href="today.php">오늘의 명화 감상하기</a>';
    }
  } else{
    if($Y_target_time > $lastcreated_time){
      $today_link = '<a href="today.php">오늘의 명화 감상하기</a>';
    }
  }
} else{
  	$today_link = '<a href="today.php">오늘의 명화 감상하기</a>';
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Today's Masterpiece</title>
    <meta charset="utf-8" />
    <meta name="description" content="매일 아침 8시에 만나는 나만의 세계명화 컬렉션">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google-site-verification" content="IQJrorhOcBzbwueQPyAH-p35CchiP-TiDFgY9k9xq18" />
    <meta property="og:type" content="website">
    <!-- 이거 써야됨
    <meta property="og:title" content="페이지 제목">
    <meta property="og:description" content="페이지 설명">
    <meta property="og:image" content="http://www.mysite.com/article/article1_featured_image.jpg">
    <meta property="og:url" content="http://www.mysite.com/article/article1.html">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="페이지 제목">
    <meta name="twitter:description" content="페이지 설명">
    <meta name="twitter:image" content="http://www.mysite.com/article/article1.html">
    <meta name="twitter:domain" content="사이트 명"> -->
		<link rel="stylesheet" href="assets/css/main.css" />
    <script data-ad-client="ca-pub-2507172034605671" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Clarity tracking code for https://todays-masterpiece.com/ -->
    <script>
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "5icrz6kghe");
    </script>
	</head>
	<body>

	<?php
		 if(isset($_SESSION['userid'])) {
	?>

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
    			<section id="two" class="wrapper style3">
    				<div class="inner">
    					<header class="align-center">
    						<p>나만을 위한 오늘의 명화</p>
    						<h2><?=$today_link?></h2>
    					</header>
    				</div>
    			</section>

          <!-- 2 -->
      			<section id="three" class="wrapper style2">
      				<div class="inner">
      					<header class="align-center">
      						<p class="special">내가 감상한 명화 목록</p>
      						<h2><a href="record.php">My collection</a></h2>
      					</header>
      				 </div>
      			</section>

          <!-- 3 -->
            <section id="two" class="wrapper style3">
              <div class="inner">
                <header class="align-center">
                  <p>configuration</p>
                  <h2><a href="config.php">설정</a></h2>
                </header>
              </div>
            </section>
           <!-- 4 -->
       			<section id="three" class="wrapper style2">
       				<div class="inner">
       					<header class="align-center">
       						<p class="special">광고를 시청하시면 오늘의 명화 1회 활성화</p>
       						<h2>광고배너</h2>
       					</header>
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

				 <?php
				 }
				 else {
 				 ?>

         <!-- Header -->
           <header id="header">
             <div class="logo"><a href="index.html">Today's Masterpiece <span>by Retyper</span></a></div>
             <a href="#menu">Menu</a>
           </header>

         <!-- Nav -->
           <nav id="menu">
             <ul class="links">
               <li><a href="index.php">Home</a></li>
             </ul>
           </nav>
         <!-- Banner -->
         <section class="banner full">
           <article>
             <img src="images/slide01.jpg" alt="" />
             <div class="inner">
               <header>
                 <p>미(美)를 창조·표현하려고 하는 인간 활동 및 그 작품</a></p>
                 <h2>예술</h2>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide02.jpg" alt="" />
             <div class="inner">
               <header>
                 <p>새로운 것을 처음으로 만드는 것</p>
                 <h2>창작</h2>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide03.jpg"  alt="" />
             <div class="inner">
               <header>
                 <p>원상과 비슷한 모상을 만들어내는 것</p>
                 <h2>모방</h2>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide04.jpg"  alt="" />
             <div class="inner">
               <header>
                 <p>예술 작품을 이해하여 즐기고 평가하는 것</p>
                 <h2>감상</h2>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide05.jpg"  alt="" />
             <div class="inner">
               <header>
                 <p>대상을 파악하고 가능성을 예측하며 지식이나 개념을 만들어 내는 활동</p>
                 <h2>사유</h2>
               </header>
             </div>
           </article>
         </section>

         <section id="three" class="wrapper style2">
           <div class="inner">
             <header class="align-center">
     					 <br>
     					 <button onclick="location.href='./login.php'">로그인하기</button>
     					 <br>
               <br>
               <br>
               <br>
             </header>
            </div>
         </section>
				 <?php   }
				 ?>

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
