<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QnA 글쓰기</title>
    <?php
    require_once "../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/bulletin/write_post.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
<!--        <script src="../../library/ckeditor5/src/ckeditor.js"></script>-->
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
<!--    <script src="http://192.168.56.1/src/ckfinder/ckfinder.js"></script>-->
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<section class="QnA-write-section">


    <form action="register_post.php" method="post">
        <div class="QnA-write-main-title">
            <h3 class="title">문의 작성</h3>
            <button class="register-post btn btn-outline-secondary btn-sm" type="submit">등록</button>
        </div>

        <div class="QnA-input-area">

            <input class="form-control QnA-input-title" name="title" type="text" placeholder="제목을 입력해주세요."
                   aria-label="">

            <div class="QnA-input-description">
                <!-- 2. TEXT 편집 툴을 사용할 textarea -->
                <textarea class="description" name="content" id="editor"></textarea>
            </div>

            <div class="is_secret form-check">
                <input class="form-check-input" type="checkbox" name="lock_post" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    비밀글 설정
                </label>
            </div>

        </div>


    </form>


</section>

<script>

    ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: 'http://192.168.56.1/src/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            options :  {
                resourceType :  'Images'
            } },
    })
        .catch(error => {
            console.error(error);
        });
</script>


</body>
</html>
