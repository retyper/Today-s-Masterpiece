<?php
  $id = $_POST['id'];
  $pw = $_POST['pw'];
  $pwcf = $_POST['pwcf'];
      if ( $pw !== $pwcf ) {
?>        <script>
                alert("비밀번호가 일치하지 않습니다.");
                history.back();
          </script>
<?php
} elseif ($id === "" or $id === False) {
?>        <script>
                alert("아이디를 작성해 주세요.");
                history.back();
          </script>
<?php
} elseif ($pw === "" or $pw === False or $pwcf ==="" or $pwcf === False) {
?>        <script>
                alert("비밀번호를 작성해 주세요.");
                history.back();
          </script>
<?php
} else {

  $conn = mysqli_connect(
  'localhost',
  'root',
  'dhfhfk12',
  'todays_masterpiece')
  or die("fail");

  $filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'pw'=>mysqli_real_escape_string($conn, $_POST['pw'])
  );

	$sql = "select * FROM audience WHERE id = '{$filtered['id']}'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	$_tmpgetresult = $row['id'];

		if($filtered['id'] === $_tmpgetresult){
		?>
        <script>
          alert("이미 등록된 아이디 입니다.");
          history.back();
        </script>
		<?php
		} else{

      $date = date('Y-m-d H:i:s');

      $sql = "
        INSERT INTO audience(
          id,
          pw,
          date,
          permit
        )
          VALUES(
            '{$filtered['id']}',
            '{$filtered['pw']}',
            '$date',
            0
        )
        ";

       $result = $conn->query($sql);
        //저장이 됬다면 (result = true) 가입 완료
        if($result) {
          ?>
          <script>
          alert("환영합니다! 관람객 등록에 성공 하였습니다. :)");
          location.replace("./login.php");
          </script>
          <?php
        } else {
          ?>
          <script>
          alert("관람객 등록에 실패하였습니다...:( 관리자에게 문의하세요.");
          </script>
          <?php
        }
        mysqli_close($conn);
      }
}
?>
