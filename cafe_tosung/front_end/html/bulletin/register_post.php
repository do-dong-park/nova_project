<?php

include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";
session_start();

//각 변수에 write.php에서 input name값들을 저장한다
$title = $_POST['title'];
$content = $_POST['content'];

if(isset($_POST['lock_post'])) {
    $lock_post = 1;
} else {
    $lock_post = 0;
}

$post_type = $_POST['post_type'];

if($post_type == 1) {
    $location = '/front_end/html/bulletin/Community.php';
} else {
    $location = '/front_end/html/bulletin/Q&A.php';
}

echo $post_type;

?>

    <script> var location = <?=$location ?></script>
<?php
if($title && $content){
//    test1이란 작성자로만 작성중임.

    $find_member_no = mq("SELECT member_no FROM php_real_project.member_info where id = '".$_SESSION['user_id']."' ");
    $member_no = $find_member_no->fetch_array();
    $mno = $member_no['member_no'];

    $sql = mq("insert into php_real_project.board_info(board_category, title, writer_code, disLike, content, file_no, CreateDate, UpdateDate, hit, category, group_no, group_seq, group_depth, use_secret) values('".$post_type."','".$title."', '".$mno."',0,'".$content."',null,now(),now(),0,0,last_insert_id(),null,1,'".$lock_post."')");
    $sql2 = mq("UPDATE php_real_project.board_info SET group_no=LAST_INSERT_ID() WHERE board_no=LAST_INSERT_ID()");
//    데이터가 추가될 때 group_no의 값은 기본키 값과 동일하다
    ?>
    <script>alert('글쓰기 완료되었습니다.');
    location.href='<?php echo $location; ?>'</script>
<?php
}else{
    echo "<script>
    alert('글쓰기에 실패했습니다.');
    history.back();</script>";
}
?>