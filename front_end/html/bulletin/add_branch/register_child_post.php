<?php

include $_SERVER['DOCUMENT_ROOT']."/back_end/PHP/connect_db.php";
session_start();

//각 변수에 write.php에서 input name값들을 저장한다
$bno = $_POST['bno'];
$title = $_POST['title'];
$content = $_POST['content'];
$group_no = $_POST['g_no'];
$group_seq = $_POST['g_seq'];
$group_depth = $_POST['g_depth'];

if(isset($_POST['lock_post'])) {
    $lock_post = 1;
} else {
    $lock_post = 0;
}

$find_member_no = mq("SELECT member_no FROM php_real_project.member_info where id = '".$_SESSION['user_id']."' ");
$member_no = $find_member_no->fetch_array();
$mno = $member_no['member_no'];



//만약, 내가 쓴 글의

if($title && $content){
//    test1이란 작성자로만 작성중임.

    $sql3 = mq("select * from php_real_project.board_info where group_no='".$group_no."'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
    $group_count = mysqli_num_rows($sql3);
    $sql = mq("insert into php_real_project.board_info(board_category, title, writer_code, disLike, content, file_no, CreateDate, UpdateDate, hit, category, group_no, group_seq, group_depth, use_secret) values(0,'".$title."','".$mno."',0,'".$content."',null,now(),now(),0,0,'".$group_no."','".$bno."','".$group_depth."'+1,'".$lock_post."')");
//    $sql2 = mq("UPDATE php_real_project.board_info SET group_no=LAST_INSERT_ID() WHERE board_no=LAST_INSERT_ID()");


//    데이터가 추가될 때 group_no의 값은 기본키 값과 동일하다
    echo "<script>
    alert('글쓰기 완료되었습니다.');
    location.href='/front_end/html/bulletin/Q&A.php';</script>";
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>