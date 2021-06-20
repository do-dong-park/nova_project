<?php

include $_SERVER['DOCUMENT_ROOT']."/back_end/PHP/connect_db.php";

//각 변수에 write.php에서 input name값들을 저장한다
$bno = $_POST['bno'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
?>
    <script>
        var index = "<?php echo $bno; ?>";
    </script>

<?php
if($title && $content){
    $sql = mq("update php_real_project.board_info set title='".$title."',content='".$content."',UpdateDate=now() where board_no='".$bno."'");
    echo "<script>
    alert('글 수정이 완료되었습니다.');
    location.href='http://192.168.56.1/front_end/html/bulletin/view-post.php?idx='+index;</script>";
}else{
    echo "<script>
    alert('제목과 내용을 입력하세요.');
    history.back();</script>";
}
?>