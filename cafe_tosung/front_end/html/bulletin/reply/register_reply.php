<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";
session_start();

$bno = $_POST['bno'];
$content = $_POST['reply_content'];

if($bno && $_POST['reply_content']){

    $find_member_no = mq("SELECT member_no FROM php_real_project.member_info where id = '".$_SESSION['user_id']."' ");
    $member_no = $find_member_no->fetch_array();
    $mno = $member_no['member_no'];

    $sql = mq("insert into php_real_project.reply(board_no, comment_writer, reply_content, reply_createDate, reply_modifyDate, reply_use_secret, reply_group_no, reply_group_seq, reply_group_depth) values('".$bno."', '".$mno."', '".$content."', now(), null, 0, last_insert_id(), null, 1)");
    $sql2 = mq("UPDATE php_real_project.reply SET reply_group_no=LAST_INSERT_ID() WHERE reply_no=LAST_INSERT_ID()");
    echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='/front_end/html/bulletin/view-post.php?idx=$bno';</script>";
}else{
    echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
}
?>