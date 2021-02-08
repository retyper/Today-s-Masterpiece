<?php
include "db.php";
if(!isset($_SESSION["userid"]))
{
header("location:login.php");
}

$id = $_SESSION['userid']; // 사용자의 IP주소 가져오기
$impression_id = $_POST['articleId']; // 게시글 아이디
$service_code = $_GET['getLikedByCode'];

if(!empty($impression_id)) {
    $sql1 = "SELECT * from service_like WHERE impression_id = '$impression_id' AND liked_audience = '$id'";
    $result = mysqli_query($conn,$sql1);
    $res1 = mysqli_num_rows($result); // sql 의 행 갯수를 가져옴

    if($res1 == 0) {
        // 좋아요 기록이 없는 경우 -> 좋아요 등록
        $sql2 = "INSERT into service_like VALUES(0, '$impression_id', '$id', sysdate())";
        $res2 = mysqli_query($conn,$sql2);

        // 게시판 테이블 업데이트
        $sql3 = "UPDATE all_impression SET like_count = like_count + 1 WHERE impression_id = '$impression_id'";
        $res3 = mysqli_query($conn,$sql3);
        echo $res2 && $res3 ? "like" : "failed";
    } else {
        // 이미 좋아요를 누른 경우 -> 좋아요 취소
        $sql2 = "DELETE from service_like WHERE impression_id = '$impression_id' AND liked_audience = '$id'";
        $res2 = mysqli_query($conn,$sql2);

        // 게시판 테이블 업데이트
        $sql3 = "UPDATE all_impression SET like_count = like_count - 1 WHERE impression_id = '$impression_id'";
        $res3 = mysqli_query($conn,$sql3);
        echo $res2 && $res3 ? "unlike" : "failed";
    }
} else if(!empty($service_code)) {
    $sql1 = "SELECT * from service_like WHERE impression_id = '$service_code' AND liked_audience = '$id'";
    $result = mysqli_query($conn,$sql1);
    $res1 = mysqli_num_rows($result);
    
    echo $res1 != 0 ? "liked" : "unliked";

}

?>
