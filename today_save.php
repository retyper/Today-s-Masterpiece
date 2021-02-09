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
        NOW()
    )
";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
    echo '저장실패. 관리자에게 보고하세요';
} else {
  header('location: record.php');
}

?>
