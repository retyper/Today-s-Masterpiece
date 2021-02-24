<?php

include "db.php";
if(!isset($_SESSION["userid"]))
{

header("location:login.php");
}
//인서트 하기 전에 여기서 최신 저장시간 비교 해야함!!!

$filtered = array(
  'audience_id'=>mysqli_real_escape_string($conn, $_POST['audience_id']),
  'picture_id'=>mysqli_real_escape_string($conn, $_POST['picture_id']),
  'impression'=>mysqli_real_escape_string($conn, $_POST['impression'])
);

$myid = $_SESSION['audience_id'];

$sql = "SELECT * FROM my_impression WHERE audience_id ='$myid' ORDER BY created DESC limit 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

date_default_timezone_set('Asia/Seoul');
$time = date("Y-m-d H:i:s");

if(isset($row['created'])){
  $now = strtotime(date("Y-m-d H:i:s"));
  $target_time = strtotime(date("08:00:00"));
  $lastcreated_time = strtotime($row['created']);
  $Y_target_time = $target_time - "86400";

  if($now >= $target_time){
    if($lastcreated_time < $target_time){
      $sql = "
        INSERT INTO my_impression(
          audience_id,
          picture_id,
          impression,
          created
        )
          VALUES(
              '{$filtered['audience_id']}',
              '{$filtered['picture_id']}',
              '{$filtered['impression']}',
              '{$time}'
          )
      ";
      $result = mysqli_query($conn, $sql);
      if($result === false){
          echo mysqli_error($conn);
          echo '저장실패. 관리자에게 보고하세요';
      } else {
        header('location: record.php');
      }
    } else {
      ?>      <script>
                  alert("오늘의 명화는 이미 저장되었습니다. My collection 에서 확인하세요:)");
                  location.replace("./index.php");
              </script>
      <?php
    }
  } else{
    if($Y_target_time > $lastcreated_time){
      $sql = "
        INSERT INTO my_impression(
          audience_id,
          picture_id,
          impression,
          created
        )
          VALUES(
              '{$filtered['audience_id']}',
              '{$filtered['picture_id']}',
              '{$filtered['impression']}',
              '{$time}'
          )
      ";
      $result = mysqli_query($conn, $sql);
      if($result === false){
          echo mysqli_error($conn);
          echo '저장실패. 관리자에게 보고하세요';
      } else {
        header('location: record.php');
      }
    } else{
      ?>      <script>
                  alert("오늘의 명화는 이미 저장되었습니다. 아침 8시 이후에 다시 시도하세요:)");
                  location.replace("./index.php");
              </script>
      <?php
    }
  }
} else{
  $sql = "
    INSERT INTO my_impression(
      audience_id,
      picture_id,
      impression,
      created
    )
      VALUES(
          '{$filtered['audience_id']}',
          '{$filtered['picture_id']}',
          '{$filtered['impression']}',
          '{$time}'
      )
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
      echo mysqli_error($conn);
      echo '저장실패. 관리자에게 보고하세요';
  } else {
    header('location: record.php');
  }
}

?>
