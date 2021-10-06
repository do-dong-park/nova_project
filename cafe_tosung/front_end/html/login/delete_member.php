<?php

include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";

//각 변수에 write.php에서 input name값들을 저장한다
@session_start();
$user_id = $_SESSION['user_id'];

$sql = mq("delete from php_real_project.member_info where id='".$user_id."'");

if($sql) {
    ?>
    <script type="text/javascript">alert("탈퇴가 완료되었습니다."); location.href='http://192.168.56.1/front_end/html/cafe/main_page.php'</script>
    <?php
}

?>

<?php

$result = session_destroy(); //세션을 닫아준다
//저장된 쿠키도 삭제시킴....
setcookie("user_id","",time(),"/");
setcookie("user_pw","",time(),"/");

?>


