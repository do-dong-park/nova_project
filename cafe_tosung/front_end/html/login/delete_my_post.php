<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";

$delArr = $_POST['chk'];
$search_type = $_POST['search_type'];


for ($i = 0; $i < sizeof($delArr); $i++) {

    if ($search_type == 'post') {
        $sql = mq("delete from php_real_project.board_info where board_no='" . $delArr[$i] . "';");
    } else {
        $sql = mq("delete from php_real_project.reply where reply_no='$delArr[$i]';");
    }// 이부분에서 넘어온 배열처리된 각각의 no  값을 받아서 삭제하면된다.
}
?>
</body>
</html>
<script type="text/javascript">alert("삭제되었습니다.");
    history.back(); </script>