<?php

include $_SERVER['DOCUMENT_ROOT']."/back_end/PHP/connect_db.php";

//각 변수에 write.php에서 input name값들을 저장한다
$title = $_POST['title'];
$content = $_POST['content'];
if(isset($_POST['lock_post'])) {
    $lock_post = 1;
} else {
    $lock_post = 0;
}

if($title && $content){
//    test1이란 작성자로만 작성중임.
    $sql = mq("insert into php_real_project.board_info(board_category, title, writer_code, reply_count, content, file_no, CreateDate, UpdateDate, hit, category, group_no, group_seq, group_depth, use_secret) values(0,'".$title."',1,0,'".$content."',null,now(),now(),0,0,last_insert_id(),null,1,'".$lock_post."')");
    $sql2 = mq("UPDATE php_real_project.board_info SET group_no=LAST_INSERT_ID() WHERE board_no=LAST_INSERT_ID()");
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