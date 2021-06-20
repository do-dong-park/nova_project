<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php"; ?>
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
    <link rel="stylesheet" href="../../css/bulletin/reply/reply.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<?php
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$sql = mq("select bi.board_no, bi.title,bi.content, mi.nickname, bi.CreateDate, bi.reply_count from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.board_no='" . $bno . "' "); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();

$sql2 = mq("select *  from php_real_project.reply where board_no = '" . $bno . "' ");
$rep_count =  mysqli_num_rows($sql2);


?>

<section class="QnA-view-section">

    <!--    글 제목 위에 있는 버튼들-->
    <div class="control_post">

        <div class="left_btn">
            <form action="http://192.168.56.1/front_end/html/bulletin/modify_post.php" method="post">
                <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                <input type="submit" class="modify-post btn btn-sm btn-outline-secondary" value="수정">
            </form>

            <form action="http://192.168.56.1/front_end/html/bulletin/delete_post.php" method="post">
                <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                <input type="submit" class="modify-post btn btn-sm btn-outline-secondary" value="삭제">
            </form>
        </div>

        <div class="right_btn">
            <button class="right_btn list-post btn btn-sm btn-outline-secondary"
                    onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/Q&A.php'">목록
            </button>
            <button class="right_btn previous-post btn btn-sm btn-outline-secondary" onclick="location.href = '#'">이전 글
            </button>
            <button class="right_btn next-post btn btn-sm btn-outline-secondary" onclick="location.href = '#'">다음 글
            </button>
        </div>
    </div>

    <!--    글 제목 부분-->
    <div class="QnA-view-main-title">
        <h2 class="title"><?php echo $board['title']; ?></h2>
    </div>
    <!--    글 제목 아래에 있는 작성자 정보-->
    <div class="writer_info">
        <p>작성자 : <?php echo $board['nickname']; ?> / 등록일자 : <?php echo $board['CreateDate']; ?> / 댓글수
            : <?php echo $rep_count; ?></p>
    </div>

    <div class="QnA-view-area">
        <div class="QnA-view-description">
            <?php echo nl2br("$board[content]"); ?>
        </div>

        <div class="QnA-view-comment">
            <div class="card-header bg-light">
                <i class="fa fa-comment fa"></i> 댓글
            </div>

            <!--            댓글 목록-->
            <?php
            // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시

            while ($reply = $sql2->fetch_array()) {

                //                오늘날짜와 비교하여, 게시판에 보일 시간 양식 선택
                $rno = $reply['reply_no'];
                $time = $reply['reply_createDate'];
                ?>

                <div class="reply_list">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-inline mb-2">
                                <div><i class="fa fa-user-circle-o fa-2x"></i><b> test 1</b></div>
                            </div>
                            <div class="dap_to comt_edit"><?php echo nl2br("$reply[reply_content]"); ?></div>
                            <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                            <div><?php echo $time; ?> <a href="#">답글쓰기</a></div>
                            <div class="reply_control">

                                <form action="http://192.168.56.1/front_end/html/bulletin/reply/delete_reply.php"
                                      method="POST">
                                    <input type="hidden" name="bno" value="<?php echo $bno; ?>"/>
                                    <input type="hidden" name="rno" value="<?php echo $rno; ?>"/>
                                    <a href="#" onclick="this.parentNode.submit()">삭제</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- 댓글 수정 폼 dialog -->


                <!--                <div class="reply_input">-->
                <!--                    <form action="http://192.168.56.1/front_end/html/bulletin/reply/register_reply.php" method="post">-->
                <!--                        <input type="hidden" name="rno" value="--><?php //echo $reply['reply_no']; ?><!--"/>-->
                <!--                        <input type="hidden" name="b_no" value="--><?php //echo $bno; ?><!--">-->
                <!--                        <ul class="list-group list-group-flush">-->
                <!--                            <li class="list-group-item">-->
                <!--                                <div class="form-inline mb-2">-->
                <!---->
                <!--                                    <div><i class="fa fa-user-circle-o fa-2x"></i><b> test 1</b></div>-->
                <!--                                </div>-->
                <!--                                <input type="hidden" name="bno" value="--><?php //echo $bno; ?><!--">-->
                <!--                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"-->
                <!--                                          name="reply_content"-->
                <!--                                          placeholder="내용을 입력해주세요.">--><?php //echo $reply['reply_content']; ?><!--</textarea>-->
                <!--                                <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="수정">-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                    </form>-->
                <!--                </div>-->


                <?php
            }
            ?>


            <!--            댓글 입력부분.-->
            <div class="reply_input">
                <form action="http://192.168.56.1/front_end/html/bulletin/reply/register_reply.php" method="post">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-inline mb-2">

                                <div><i class="fa fa-user-circle-o fa-2x"></i><b> test 1</b></div>
                            </div>
                            <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      name="reply_content"
                                      placeholder="내용을 입력해주세요."></textarea>
                            <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="등록">
                        </li>
                    </ul>
                </form>
            </div>


        </div>

    </div>

    <!--글 아래 조그만한 게시판 섹션-->
    <div class="board_bottom_btn">
        <button class="modify-post btn btn-outline-secondary"
                onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/write_post.php'">글쓰기
        </button>
        <button class="delete-post btn btn-outline-secondary"
                onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/write_post.php'">답글
        </button>

    </div>


</section>

</body>
</html>
