<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원 정보 수정</title>
    <?php
    require_once "../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/login/modify-my-profile.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<section class="check-my-profile-section">

    <div class="check-my-profile-title">
        <h1 class="title">내 회원정보 <span>수정</span></h1>
        <button class="modify-my-profile-btn btn btn-outline-secondary btn-sm">수정 정보 저장</button>
    </div>

    <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
    <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->

    <table class="check-my-profile-table table table-striped table-hover">

        <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
        <colgroup>
            <col span="1" class="my-profile-info-index">
            <col span="1" class="my-profile-info-value">
            <col span="1" class="my-profile-info-mf-btn">
        </colgroup>

        <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
        <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
        <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
        <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->

        <tbody>

        <tr class="my-info-img" id="profile-image-area">
            <th scope="row">사진 변경</th>
            <td>

                <img src="../../img/기타/유저-기본이미지.png" class="my-profile-image" alt="사진이 없습니다." width="80">

                <div class="mb-3">
                    <!--기본 이미지가 들어갈 공간-->

                    <input class="form-control form-control-sm" id="formFileSm" type="file">

                    <button type="button" class="btn btn-outline-secondary btn-sm">기본 이미지로 변경</button>
               </div>

            </td>
        </tr>

        <tr>
            <th scope="row">ID 변경</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>
                <input type="text" class="form-control mf-ID" placeholder="새 아이디 (6-12자 이내,영문,숫자 사용 가능)">
            </td>
        </tr>

        <tr>
            <th scope="row">PW 변경</th>

            <td>
                <table class="table modify-my-pw-table">
                    <tr>
                        <!--                        <th>-->
                        <!--                            현재 비밀번호-->
                        <!--                        </th>-->
                        <td>
                            <input type="password" class="form-control current-pw" placeholder="현재 비밀번호">
                            <button type="button" class="btn btn-outline-secondary btn-sm">비밀번호 변경</button>
                        </td>
                    </tr>
                    <tr>
                        <!--                        <th>-->
                        <!--                            새 비밀번호-->
                        <!--                        </th>-->
                        <td>
                            <input type="password" class="form-control new-pw" placeholder="새 비밀번호 (8자 이상,영문,숫자 사용 가능)">
                        </td>
                    </tr>
                    <tr>
                        <!--                        <th>-->
                        <!--                            비밀번호 다시 입력-->
                        <!--                        </th>-->
                        <td>
                            <input type="email" class="form-control new-pw-confirm" placeholder="비밀번호 다시 입력">
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <th scope="row">이름 변경</th>
            <td>
                <input type="text" class="form-control mf-name" placeholder="이름">
            </td>
        </tr>

        <tr>
            <th scope="row">닉네임 변경</th>
            <td>
                <input type="text" class="form-control mf-nickname" placeholder="새 닉네임 (6-12자 이내,영문,숫자 사용 가능)">
            </td>
        </tr>

        <tr>
            <th scope="row">이메일</th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>
                <input type="text" class="form-control mf-email" placeholder="새 이메일">
                <button type="button" class="btn btn-outline-secondary btn-sm">이메일 인증</button>
            </td>
        </tr>

        </tbody>
    </table>


    <!--    비밀번호 변경할 때 쓰는 양식입니다.-->


</section>

</body>
</html>
<?php
