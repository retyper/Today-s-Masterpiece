<?php

include "db.php";
if(!isset($_SESSION["userid"]))
{

header("location:login.php");
}

$filtered = array(
  'impression'=>mysqli_real_escape_string($conn, $_POST['impression'])
);

$sql = "
  UPDATE my_impression
    SET
      impression = '{$filtered['impression']}'
    WHERE
      audience_id = {$_SESSION['audience_id']}
    AND
      picture_id = {$_POST['picture_id']}
";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
    echo '변경실패. 관리자에게 보고';
} else {
    header('location: record.php');
}
?>
