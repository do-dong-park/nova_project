<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";

$rno = $_POST['rno'];
$sql = mq("select * from php_real_project.reply where reply_no='" . $rno . "'");//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$bno = $_POST['bno'];
$sql2 = mq("select * from php_real_project.reply where board_no='" . $bno . "'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$sql = mq("delete from php_real_project.reply where reply_no='" . $rno . "'"); ?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.');
    location.replace("http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $bno; ?>");</script>
