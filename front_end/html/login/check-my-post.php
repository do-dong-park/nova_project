<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";
session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>내가 쓴 글</title>
    <?php
    require_once "../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/login/check_my_post.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>


<!--//post로 받은 id을 조건으로 table로부터, 해당 열을 추출.-->

<section class="check-my-post-section">
    <h1 class="title">내 글 보기</h1>
    <form class="search_box" action="http://192.168.56.1/front_end/html/login/check-my-post.php" method="get">
        <select name="search_area">
            <!--            <option value="total_post">전체보기</option>-->
            <option value="question">문의</option>
            <option value="community">자유 게시판</option>
        </select>

        <select name="search_type">
            <option value="post">게시글</option>
            <option value="reply">댓글</option>
            <!--            <option value="content">댓글 단 글</option>-->
        </select>
        <input class="btn btn-outline-secondary btn-sm" type="submit" value="검색">
    </form>

    <form name="myPost" action="" method="post">


        <!--    class : table은 테두리 만들어주는 친구 / striped 줄마다 색 다르게 / table-hover - 마우스 위에 있을 때 반응! -->
        <!--    있다가 게시판 만들 때는 striped 옵션 꺼야 해요!-->


        <!--        ====================================게시판 메인====================================        -->


        <?php
        $id = $_SESSION['user_id'];


        // 내가 쓴 게시글 보기
        if ($_GET['search_type'] == "post") {

//
            if ($_GET['search_area'] == "question") {
                $board_type = 0;

            } else if ($_GET['search_area'] == "community") {
                $board_type = 1;

            } ?>

            <table class="QnA-table table table-hover">

                <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
                <colgroup>
                    <col span="1" class="QnA-check" width="10%">
                    <col span="1" class="QnA-num" width="10%">
                    <col span="1" class="QnA-title" width="50%">
                    <col span="1" class="QnA-date">
                    <col span="1" class="QnA-is-end">
                </colgroup>

                <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
                <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
                <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
                <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->


                <thead class="QnA-table-thead">
                <tr>
                    <th scope="col"><input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                           value="select_all" onclick="selectAll(this)" aria-label="..."></th>
                    <th scope="col">번호</th>
                    <th scope="col">제목</th>
                    <th scope="col">작성일</th>
                    <th scope="col">답변 상태</th>
                </tr>
                </thead>

                <?php
                //내가 쓴 문의 글 보기!
                $sql = mq("select bi.board_no, bi.title, mi.nickname, mi.id, bi.CreateDate, bi.group_no, bi.group_seq, bi.group_depth, bi.use_secret from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.writer_code = mi.member_no and bi.board_category='" . $board_type . "' and mi.id ='" . $id . "' order by bi.group_no desc, group_depth asc,  group_seq desc limit 0,10");

                while ($board = $sql->fetch_array()) {

                    //title변수에 DB에서 가져온 title을 선택
                    $title = $board['title'];

                    $sql2 = mq("select * from php_real_project.reply where board_no='" . $board['board_no'] . "'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
                    $rep_count = mysqli_num_rows($sql2);

//                시간 설정 포맷
                    date_default_timezone_set("Asia/Seoul");

//                오늘날짜와 비교하여, 게시판에 보일 시간 양식 선택
                    $time = DateTime::createFromFormat('Y-m-d H:i:s', $board['CreateDate']);
                    $time = date_format($time, 'Y-m-d');
//
                    $now = date('Y-m-d', time());

                    if ($time === $now) {
                        $time = DateTime::createFromFormat('Y-m-d H:i:s', $board['CreateDate']);
                        $time = date_format($time, 'H:i');
                    } else {
                        $time = DateTime::createFromFormat('Y-m-d H:i:s', $board['CreateDate']);
                        $time = date_format($time, 'Y-m-d');
                    }
//                시간처리 끝

//                답변 완료 표현하기. - 댓글 갯수가 1보다 크면, 답변 완료
                    if ($rep_count > 0) {
                        $is_answered = "답변 완료";
                    } else {
                        $is_answered = "미답변";
                    }

//                들여쓰기 계산
                    $depth = str_repeat('&nbsp&nbsp&nbsp&nbsp', $board['group_depth'] - 1);

                    if ($board['group_depth'] > 1) {
                        $indent = "ㄴ";
                    } else {
                        $indent = "";
                    }


                    ?>

                    <tbody class="QnA-table-body">
                    <tr>
                        <th scope="row"><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value=""
                                               aria-label="..."></th>
                        <td><?php echo $board['board_no']; ?></td>
                        <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
                        <td>
                            <!--                        포스트가 잠겨있는지 진위 여부 판단-->
                            <?php
                            if ($board['use_secret'] == 1) {
                                if ($rep_count > 0) { ?>
                                    <a href="#"
                                       onclick="location.replace('/front_end/html/bulletin/unlock_post.php?idx=<?php echo $board['board_no']; ?>');">  <?php echo $depth; ?><?php echo $indent; ?>
                                        <i class="fas fa-lock"></i> <?php echo $board['title']; ?> <span
                                                class="re_ct"> [<?php echo $rep_count; ?>]</span></a>
                                    <?php
                                } else { ?>
                                    <a href="#"
                                       onclick="location.replace('/front_end/html/bulletin/unlock_post.php?idx=<?php echo $board['board_no']; ?>');">  <?php echo $depth; ?><?php echo $indent; ?>
                                        <i class="fas fa-lock"></i> <?php echo $board['title']; ?></a>
                                    <?php
                                } ?>

                            <?php } else {
                                if ($rep_count > 0) { ?>
                                    <a href="/front_end/html/bulletin/view-post.php?idx=<?php echo $board['board_no']; ?>"><?php echo $depth; ?><?php echo $indent; ?><?php echo $board['title']; ?>
                                        <span class="re_ct"> [<?php echo $rep_count; ?>]</span></a>
                                <?php } else { ?> <a
                                        href="/front_end/html/bulletin/view-post.php?idx=<?php echo $board['board_no']; ?>"><?php echo $depth; ?><?php echo $indent; ?><?php echo $board['title']; ?></a> <?php }
                            } ?>
                        </td>
                        <td><?php echo $time; ?></td>
                        <td><?php echo $is_answered; ?></td>
                    </tr>
                    </tbody>
                <?php } ?>
            </table>

























            <!-- 내가 쓴 댓글 볼 때    -->
        <?php } else if ($_GET['search_type'] == "reply") {

            if ($_GET['search_area'] == "question") {
                $board_type = 0;

            } else if ($_GET['search_area'] == "community") {
                $board_type = 1;

            } ?>

            <table class="community-table table table-hover">

                <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
                <colgroup>
                    <col span="1" class="my_reply_checkbox" width="10%">
                    <col span="1" class="my_reply_content" width="60%">
                    <col span="1" class="my_reply_time">
                </colgroup>

                <!--    thead (table head) 태그는 표의 열 인덱스 값을 지정할 것이라고 선언하는데 사용합니다., 박스의 역할임-->
                <!--    thead 안에 tr(table row element)가 들어가는데, 셀의 행을 정의하는 역할을 수행합니다. td와 th을 섞어 쓰면서 내용을 채웁니다.-->
                <!--    th는 tr안에 들어갑니다. 행과 열의 인덱스 값을 채워 넣는데 사용됩니다. scope="col or row"를 통해 행요소인지, 열 요소인지 지정합니다.-->
                <!--    td는 행 열 인덱스를 제외한 나머지 부분에 값을 채워 놓는데 사용합니다.-->

                <thead class="QnA-table-thead">
                <tr>
                    <th scope="col"><input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                           value="select_all" onclick="selectAll(this)" aria-label="..."></th>
                    <th scope="col">내용</th>
                    <th scope="col">작성일</th>
                </tr>
                </thead>


                <?php
                //내가 쓴 문의 글 보기!
                $sql = mq("select r.reply_no, r.board_no, mi.id, mi.nickname, r.reply_content, r.reply_createDate from php_real_project.reply as r join php_real_project.member_info as mi join php_real_project.board_info as bi where r.comment_writer = mi.member_no and r.board_no = bi.board_no and bi.board_category = '".$board_type."' and mi.id = '" . $id . "' order by r.reply_no desc limit 0,10");
                while ($reply = $sql->fetch_array()) {

                    //title변수에 DB에서 가져온 title을 선택
                    $commenter_nickname = $reply['nickname'];
                    $commenter_id = $reply['id'];
                    $rno = $reply['reply_no'];
                    $content = $reply['reply_content'];
                    $reply_time = $reply['reply_createDate'];

//                시간 설정 포맷
                    date_default_timezone_set("Asia/Seoul");
                    $now = date('Y-m-d', time());

////                오늘날짜와 비교하여, 게시판에 보일 시간 양식 선택
                    $time = DateTime::createFromFormat('Y-m-d H:i:s', $reply_time);
                    $time = date_format($time, 'Y-m-d');
////
//
////
                    if ($time === $now) {
                        $time = DateTime::createFromFormat('Y-m-d H:i:s', $reply_time);
                        $time = date_format($time, 'H:i');
                    }
//                시간처리 끝


                    ?>
                    <tbody class="QnA-table-body">
                    <tr>
                        <!--                체크박스와 나머지 들어갈 공간-->
                        <th scope="row"><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value=""
                                               aria-label="..."></th>
                        <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
                        </td>
                        <td>
                            <a href="/front_end/html/bulletin/view-post.php?idx=<?php echo $reply['board_no']; ?>"><?php echo $content; ?></a>
                        </td>
                        <td><?php echo $time; ?></td>
                    </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } ?>
        <input class="select_delete btn btn-outline-secondary btn-sm" type="submit" value="삭제">
    </form>
</section>

</body>

<script>
    function selectAll(selectAll) {
        const checkboxes
            = document.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach((checkbox) => {
            checkbox.checked = selectAll.checked
        })
    }

    //    다중 선택 삭제 구현
    //    form 태그 안에 table> td 존재
    //    td 내 체크박스에 체크가 되어 있으면, 그 줄의 board_no 혹은 reply_no를 배열에 추가
    //    삭제 버튼을 누르면, 삭제 php로 이동하여, 변수를 post로 받음.
    //    for문으로 돌리면서, 삭제 쿼리 날려줌.
    //    정상적으로 끝나면, alert 삭제가 완료되었습니다 or 체크된 글이 없으면, 삭제할 게시물을 선택해주세요 alert문구 출력
</script>
</html>