<?php
    include "db.php";

    //입력 받은 id와 password
    $filtered = array(
      'id'=>mysqli_real_escape_string($conn, $_POST['id']),
      'pw'=>mysqli_real_escape_string($conn, $_POST['pw'])
    );

    //아이디가 있는지 검사
    $sql = "select * FROM audience WHERE
      id = '{$filtered['id']}'";
    $result = $conn->query($sql);

    //아이디가 있다면 비밀번호 검사
    if(mysqli_num_rows($result)==1) {

        $row=mysqli_fetch_assoc($result);

        //비밀번호가 맞다면 세션 생성
        if($row['pw']===$filtered['pw']){
                $_SESSION['userid'] = $filtered['id'];
                $_SESSION['audience_id'] = $row['audience_id'];
                if(isset($_SESSION['userid'])){
                    $date = date('Y-m-d H:i:s');
                    $sql = "
                    UPDATE audience
                      SET
                        lastdate = '{$date}'
                      WHERE
                       id = '{$filtered['id']}'
                    ";
                    $result = $conn->query($sql);
                ?>      <script>
                                alert("로그인 되었습니다. 명화관으로 입장합니다.");
                                location.replace("./index.php");
                        </script>
<?php
                    }
                    else{
                            echo "session fail";
                    }
            }

            else {
    ?>              <script>
                            alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                            history.back();
                    </script>
    <?php
            }

    }

            else{
?>              <script>
                    alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                    history.back();
            </script>
<?php
    }


?>
