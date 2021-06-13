<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QnA 글 보기</title>
    <?php
    require_once "../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/bulletin/view-post.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<section class="QnA-view-section">

    <div class="QnA-view-main-title">
        <h3 class="title">글 제목</h3>
        <button class="delete-post btn btn-outline-secondary" onclick="location.href = '#'">삭제</button>
        <button class="modify-post btn btn-outline-secondary" onclick="location.href = '#'">수정</button>

    </div>

    <div class="QnA-view-area">
        <div class="QnA-view-description">
            <b>글 내용</b>
        </div>

        <div class="QnA-view-comment">
            <div class="card-header bg-light">
                <i class="fa fa-comment fa"></i> REPLY
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-inline mb-2">
                            <i class="fa fa-user-circle-o fa-2x"></i>
                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        <button type="button" class="btn btn-dark mt-3" onClick="javascript:addReply();">등록</button>
                    </li>
                </ul>
            </div>

        </div>

    </div>


    </div>


</section>

</body>
</html>
