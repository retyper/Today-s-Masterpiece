<?php
include "db.php";
if(!isset($_SESSION["userid"]))
{
header("location:login.php");
}

$id = $id = $_SESSION['userid'];
$impression_id = $_POST['articleId']; // 게시글 아이디
$service_code = $_GET['getLikedByCode'];

if(!empty($impression_id)) {
    $sql1 = "SELECT * from service_like WHERE service_code = '$impression_id' AND liked_audience = '$id'";
    $result1 = mysqli_query($conn,$sql1);
    $res1 = mysqli_num_rows($result1);

    if($res1 == 0) {
        // 좋아요 기록이 없는 경우 -> 좋아요 등록
        $sql2 = "insert into service_like(service_code, liked_audience, date) VALUES('$impression_id', '$id', NOW())";
        $res2 = mysqli_query($conn,$sql2);

        // 게시판 테이블 업데이트
        $sql3 = "UPDATE all_impression SET like_count = like_count + 1 WHERE impression_id = '$impression_id'";
        $res3 = mysqli_query($conn,$sql3);
        echo $res2 && $res3 ? "like" : "failed";
    } else {
        // 이미 좋아요를 누른 경우 -> 좋아요 취소
        $sql2 = "DELETE from service_like WHERE service_code = '$impression_id' AND liked_audience = '$id'";
        $res2 = mysqli_query($conn,$sql2);

        // 게시판 테이블 업데이트
        $sql3 = "UPDATE all_impression SET like_count = like_count - 1 WHERE impression_id = '$impression_id'";
        $res3 = mysqli_query($conn,$sql3);
        echo $res2 && $res3 ? "unlike" : "failed";
    }
} else if(!empty($service_code)) {
    $sql1 = "SELECT * from service_like WHERE service_code = '$service_code' AND liked_audience = '$id'";
    $result1 = mysqli_query($conn,$sql1);
    $res1 = mysqli_num_rows($result1);

    echo $res1 != 0 ? "liked" : "unliked";

}

?>
