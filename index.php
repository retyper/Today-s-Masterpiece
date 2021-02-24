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

  $today_link = '오늘의 감상이 작성되었습니다!';

  if($now >= $target_time){
    if($lastcreated_time < $target_time){
    	$today_link = '<a href="today.php">오늘의 명화 감상하기</a>';
    } else{
      $today_link = '오늘의 감상이 작성되었습니다!';
    }
  } else{
    if($Y_target_time > $lastcreated_time){
      $today_link = '<a href="today.php">오늘의 명화 감상하기</a>';
    } else{
      $today_link = '오늘의 감상이 작성되었습니다!';
    }
  }
} else{
  	$today_link = '<a href="today.php">오늘의 명화 감상하기</a>';
}

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
       						<h1>광고배너</h1>
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
             <div class="logo"><a href="index.php">Today's Masterpiece <span>by Retyper</span></a></div>
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
                <p>Today's Masterpiece</p>
                 <h2>오늘의 명화</h2>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide02.jpg" alt="" />
             <div class="inner">
               <header>
                 <p>인류 역사에서 걸작을 남긴 수 많은 대가들이 기다리고 있습니다</p>
                 <h3>세계의 대가들</h3>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide03.jpg"  alt="" />
             <div class="inner">
               <header>
                 <p>매일 아침 8시 새로운 명화를 만나보세요</p>
                 <h3>마음을 여는 아침</h3>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide04.jpg"  alt="" />
             <div class="inner">
               <header>
                 <p>예술작품을 수집하고 나만의 감상을 작성하세요</p>
                 <h3>나만의 감상</h3>
               </header>
             </div>
           </article>
           <article>
             <img src="images/slide05.jpg"  alt="" />
             <div class="inner">
               <header>
                 <p>내가 감상한 작품을 함께 본 사람들과 감상을 공유하세요</p>
                 <h3>공유와 나눔, 그리고 공감</h3>
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
