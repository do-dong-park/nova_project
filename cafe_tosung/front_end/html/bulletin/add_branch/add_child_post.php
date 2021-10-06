<?php

include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";

//각 변수에 modify.php에서 input name값들을 저장한다
$bno = $_POST['bno'];
//부모의 게시판 번호를 가져온다.
$sql = mq("select * from php_real_project.board_info where board_no='" . $bno . "' ");
$board = $sql->fetch_array();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>답글 쓰기</title>
    <?php
    require_once "../../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../../css/bulletin/modify_post.css">
    <script src="../../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
    <script src="../../../library/ckeditor5/src/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<body>

<?php
require_once "../../../common/nav_bar/my-navbar-include.php"
?>

<section class="QnA-modify-section">


    <form action="http://192.168.56.1/front_end/html/bulletin/add_branch/register_child_post.php" method="post">
        <div class="QnA-modify-main-title">
            <h3 class="title">답글 작성</h3>
            <input type="hidden" name="bno" value="<?php echo $bno; ?>">
            <input type="hidden" name="g_no" value="<?php echo $board['group_no']; ?>">
            <input type="hidden" name="g_seq" value="<?php echo $board['group_seq']; ?>">
            <input type="hidden" name="g_depth" value="<?php echo $board['group_depth']; ?>">
            <button class="register-post btn btn-outline-secondary btn-sm" type="submit">등록</button>
        </div>

        <div class="QnA-input-area">

            <input class="form-control QnA-input-title" name="title" type="text" placeholder="제목을 입력해주세요." value="<?php echo $board['title']; ?>"
                   aria-label="">

            <div class="QnA-input-description">
                <!-- 2. TEXT 편집 툴을 사용할 textarea -->
                <textarea class="description" name="content" id="editor"></textarea>
            </div>

        </div>

        <div class="is_secret form-check">
            <input class="form-check-input" type="checkbox" name="lock_post" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                비밀글 설정
            </label>
        </div>

    </form>


</section>

<script>
    // 3. CKEditor5를 생성할 textarea 지정
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>


</body>
</html>
