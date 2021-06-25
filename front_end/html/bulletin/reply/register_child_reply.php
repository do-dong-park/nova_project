<?php

include $_SERVER['DOCUMENT_ROOT']."/back_end/PHP/connect_db.php";
session_start();
//각 변수에 write.php에서 input name값들을 저장한다
$bno = $_POST['bno'];
$rno= $_POST['rno'];
$content = $_POST['reply_reply_content'];
$group_no = $_POST['g_no'];
$group_seq = $_POST['g_seq'];
$group_depth = $_POST['g_depth'];


if(isset($_POST['lock_post'])) {
    $lock_post = 1;
} else {
    $lock_post = 0;
}

?>
<script>
    var index = "<?php echo $bno; ?>";
</script>

<?php
//만약, 내가 쓴 글의

if($content){
//    test1이란 작성자로만 작성중임.

    $find_member_no = mq("SELECT member_no FROM php_real_project.member_info where id = '".$_SESSION['user_id']."' ");
    $member_no = $find_member_no->fetch_array();
    $mno = $member_no['member_no'];

    $sql3 = mq("select * from php_real_project.reply where reply_no='".$rno."'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
    $group_count = mysqli_num_rows($sql3);
    $sql = mq("insert into php_real_project.reply(board_no, comment_writer, reply_content, reply_createDate, reply_modifyDate, reply_use_secret, reply_group_no, reply_group_seq, reply_group_depth) values('".$bno."','".$mno."','".$content."',now(),null,0,'".$group_no."','".$rno."','".$group_depth."'+1)");
//    $sql2 = mq("UPDATE php_real_project.board_info SET group_no=LAST_INSERT_ID() WHERE board_no=LAST_INSERT_ID()");


//    데이터가 추가될 때 group_no의 값은 기본키 값과 동일하다
    echo "<script>
    alert('답글이 등록되었습니다.');
    location.href='http://192.168.56.1/front_end/html/bulletin/view-post.php?idx='+index;;</script>";
}else{
    echo "<script>
    alert('답글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>