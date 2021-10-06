<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QnA 게시판</title>
    <?php
    require_once "../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/bulletin/Q&A.css">
    <link rel="stylesheet" href="../../css/bulletin/Community.css">
    <link rel="stylesheet" href="/front_end/common/footer/common_footer.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<section class="QnA-section">

    <?php

    /* 검색 변수 */
    $catagory = $_GET['catgo'];
    $search_con = $_GET['search'];
    $board_type = $_GET['board_type'];

    ?>

    <?php if($catagory=='title'){
        $catname = '제목';
    } else if($catagory=='name'){
        $catname = '작성자';
    } else if($catagory=='content'){
        $catname = '내용';
    } ?>

    <?php
    if($board_type == 1) {
        $category = "자유 게시판";

    } else {
        $category = "QnA";
    }
    ?>

    <div class="QnA-main-title">
        <h3 class="title"><?php echo $category; ?>      >     <?php echo $catname; ?>     :     <?php echo $search_con; ?>    검색결과</h3>
        <!--        검색구역-->
        <div id="search_box">
            <form class="search_box" action="http://192.168.56.1/front_end/html/bulletin/search_result.php?board_type="<?php echo $category; ?> method="get">
                <select name="catgo">
                    <option value="title">제목</option>
                    <option value="name">글쓴이</option>
                    <option value="content">내용</option>
                </select>
                <input class="search_input" type="text" name="search" size="40" required="required" /> <input class="btn btn-outline-secondary btn-sm" type="submit" value="검색">
            </form>
        </div>
        <!--        검색구역 끝-->
    </div>


    <?php
    if($board_type == 1) {
        require_once 'module/community_bulletin.php';
    } else {
        require_once 'module/QnA_bulletin.php';
    }
    ?>

        <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
        <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->



        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">이전</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">다음</a>
                </li>
            </ul>
        </nav>


</section>

<?php
require_once "../../common/footer/common_footer.php"
?>

<script>

    if($( 'td:contains("답변 완료")' )) {
        $( 'td:contains("답변 완료")' ).css('color','red');
        $( 'td:contains("답변 완료")' ).css('font-weight','bold');
    }

</script>

</body>
</html>

