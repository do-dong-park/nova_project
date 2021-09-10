<?php

include $_SERVER['DOCUMENT_ROOT']."/back_end/PHP/connect_db.php";

//각 변수에 write.php에서 input name값들을 저장한다

$bno = $_POST['bno'];
$board_category = $_POST['board_category'];

if($board_category== 1) {
    $gotoList = 'http://192.168.56.1/front_end/html/bulletin/Community.php';
} else {
    $gotoList = 'http://192.168.56.1/front_end/html/bulletin/Q&A.php';
}

$sql = mq("delete from php_real_project.reply where board_no='$bno';");
$sql = mq("delete from php_real_project.board_info where board_no='$bno';");

?>

<script type="text/javascript">alert("삭제되었습니다."); location.href='<?php echo $gotoList ?>'</script>
