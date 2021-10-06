
<table class="QnA-table table table-hover">

    <!--    colgroup 태그는 표의 열을 묶는 역할을 수행한다. 인덱스 / 정보1 /정보2 등등 묶어서 스타일 지정하는데 쓴다.-->
    <colgroup>
        <col span="1" class="QnA-num" width="10%">
        <col span="1" class="QnA-title" width="50%">
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

    <?php
    // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
    //            $sql = mq("select * from php_real_project.board_info where category=0 order by board_no desc limit 0,10");
    $sql = mq("select bi.board_no, bi.title, mi.nickname, mi.pw, bi.CreateDate, bi.disLike, bi.group_no, bi.group_seq, bi.group_depth, bi.use_secret from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.writer_code = mi.member_no and bi.board_category=0 and  $catagory like '%$search_con%' order by bi.group_no desc, group_depth asc,  group_seq DESC limit 0,10");
    //            $sql = mq("select * from php_real_project.board_info where $catagory like '%$search_con%' order by board_no desc");

    while ($board = $sql->fetch_array()) {

        //title변수에 DB에서 가져온 title을 선택
        $title = $board['title'];

        $sql2 = mq("select * from php_real_project.reply where board_no='".$board['board_no']."'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
        $rep_count = mysqli_num_rows($sql2);

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
        $depth = str_repeat('&nbsp&nbsp&nbsp&nbsp', $board['group_depth']-1);

        if($board['group_depth']>1) {
            $indent = "ㄴ";
        } else {
            $indent = "";
        }


        ?>
        <tbody class="QnA-table-body">
        <tr>
            <th scope="row"><?php echo $board['board_no']; ?></th>
            <!--            colspan은 다음칸 n 칸이 비어있을 때 숫자 n으로 값을 비우는 역할을 수행한다. -->
            <td>
                <!--                        포스트가 잠겨있는지 진위 여부 판단-->
                <?php
                if($board['use_secret']==1) {
                    if ($rep_count>0) { ?>
                        <a href="#" onclick="window.open('/front_end/html/bulletin/unlock_post.php?idx=<?php echo $board['board_no']; ?>','비밀글 조회','width=400,height=150',false);"><i class="fas fa-lock"></i>  <?php echo $depth; ?><?php echo $indent; ?><?php echo $board['title']; ?>  <span class="re_ct"> [<?php echo $rep_count; ?>]</span></a>
                        <?php
                    } else { ?>
                        <a href="#" onclick="window.open('/front_end/html/bulletin/unlock_post.php?idx=<?php echo $board['board_no']; ?>','비밀글 조회','width=400,height=150',false);"><i class="fas fa-lock"></i>  <?php echo $depth; ?><?php echo $indent; ?><?php echo $board['title']; ?>  </a>
                        <?php
                    }?>

                <?php } else {
                    if ($rep_count>0) { ?>
                        <a href="/front_end/html/bulletin/view-post.php?idx=<?php echo $board['board_no']; ?>"><?php echo $depth; ?><?php echo $indent; ?><?php echo $board['title']; ?> <span class="re_ct"> [<?php echo $rep_count; ?>]</span></a>
                    <?php } else { ?> <a href="/front_end/html/bulletin/view-post.php?idx=<?php echo $board['board_no']; ?>"><?php echo $depth; ?><?php echo $indent; ?><?php echo $board['title']; ?></a> <?php } } ?>
            </td>
            <td><?php echo $board['nickname']; ?></td>
            <td><?php echo $time; ?></td>
            <td><?php echo $is_answered; ?></td>
        </tr>
        </tbody>
    <?php } ?>
</table>

