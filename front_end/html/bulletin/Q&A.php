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
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<section class="QnA-section">

    <div class="QnA-main-title">
        <h1 class="title">FAQ</h1>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    FAQ #1
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>FAQ #1</strong>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    FAQ #2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>FAQ #2</strong>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    FAQ #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>FAQ #3</strong>
            </div>
        </div>
    </div>



    <div class="QnA-main-title">
        <h1 class="title">Q&A</h1>
        <button class="add-post btn btn-outline-secondary btn-sm" onclick = "location.href = 'http://192.168.56.1/front_end/html/bulletin/write_post.php'">글 작성</button>
    </div>

    <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
    <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->

    <table class="QnA-table table table-hover">

        <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
        <colgroup>
            <col span="1" class="QnA-num">
            <col span="1" class="QnA-title">
            <col span="1" class="QnA-writer">
            <col span="1" class="QnA-date">
            <col span="1" class="QnA-is-end">
        </colgroup>

        <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
        <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
        <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
        <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->

        <thead class="QnA-table-thead">
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
            <th scope="col">답변 상태</th>
        </tr>
        </thead>

        <tbody class="QnA-table-body">

        <tr>
            <th scope="row">1</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>제목 1</td>
            <td>작성자 1</td>
            <td>작성일 1</td>
            <td>답변 상태 1</td>
        </tr>

        <tr>
            <th scope="row">2</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>제목 2</td>
            <td>작성자 2</td>
            <td>작성일 2</td>
            <td>답변 상태 2</td>
        </tr>

        <tr>
            <th scope="row">3</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>제목 3</td>
            <td>작성자 3</td>
            <td>작성일 3</td>
            <td>답변 상태 3</td>
        </tr>

        <tr>
            <th scope="row">4</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>제목 4</td>
            <td>작성자 4</td>
            <td>작성일 4</td>
            <td>답변 상태 4</td>
        </tr>

        <tr>
            <th scope="row">5</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>제목 5</td>
            <td>작성자 5</td>
            <td>작성일 5</td>
            <td>답변 상태 5</td>
        </tr>

        </tbody>
    </table>

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

</body>
</html>