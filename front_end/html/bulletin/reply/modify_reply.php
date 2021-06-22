<?php
include $_SERVER['DOCUMENT_ROOT']."/back_end/PHP/connect_db.php";
$rno = $_POST['rno'];//댓글번호

$bno = $_POST['bno']; //게시글 번호


$sql3 = mq("UPDATE php_real_project.reply SET reply_content='".$_POST['reply_content']."' WHERE reply_no = '".$rno."'"); ?>

<script type="text/javascript">alert('수정되었습니다.');
    location.replace("http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $bno; ?>");
</script>