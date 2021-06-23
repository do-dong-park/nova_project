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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../../js/reply.js"></script>

</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<?php
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$sql = mq("select bi.board_no, bi.title,bi.content, mi.nickname, bi.CreateDate, bi.reply_count from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.board_no='" . $bno . "' "); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();

$sql2 = mq("select *  from php_real_project.reply where board_no = '". $bno."' order by reply_group_no asc, reply_group_depth asc,  reply_group_seq DESC ");
$rep_count = mysqli_num_rows($sql2);
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

<!--이전글 다음글-->
            <?php $next=mq("SELECT board_no FROM php_real_project.board_info BI WHERE board_no > '".$bno."'  ORDER BY board_no LIMIT 1");
            $next = $next->fetch_array();
            $next_no=$next['board_no'];

            $prev=mq("SELECT board_no FROM php_real_project.board_info BI WHERE board_no < '".$bno."'  ORDER BY board_no DESC LIMIT 1");
            $prev = $prev->fetch_array();
            $prev_no=$prev['board_no'];

            if(!$bno) {
                echo "<script>
    alert('글이 존재하지 않습니다.');
    history.back();</script>";
            }?>

            <button class="right_btn previous-post btn btn-sm btn-outline-secondary" onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $prev_no; ?>'">
                이전 글
            </button>
            <button class="right_btn next-post btn btn-sm btn-outline-secondary" onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $next_no; ?>'">

                다음 글
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

//            $sql2 = mq("select *  from php_real_project.reply where board_no = '" . $bno . "' ");

            while ($reply = $sql2->fetch_array()) {

                $rno = $reply['reply_no'];
                $time = $reply['reply_createDate'];
                $content = $reply['reply_content'];
                $g_depth = $reply['reply_group_depth'];

                if($g_depth>1) {
                    $indent = "ㄴ";
                } else {
                    $indent = "";
                }
                ?>

                <!--                    댓글 목록 및 수정 부분-->


                <div class="reply_list" style="padding-left:<?php echo ($g_depth-1)*20; ?>px">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-inline mb-2">
                                <div><?php echo $indent; ?><i class="fa fa-user-circle-o fa-2x"></i><b> test 1</b></div>
                            </div>
                            <div class="dap_to comt_edit"><?php echo nl2br("$reply[reply_content]"); ?></div>
                            <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                            <div><?php echo $time; ?> </div>
                            <div class="reply_control">
                                <a class="add_child_reply" href="#" onclick="return false">답글 쓰기</a>

                                <form action="http://192.168.56.1/front_end/html/bulletin/reply/modify_reply.php"
                                      method="POST">
                                    <a class="modify_reply" href="#" onclick="return false">수정</a>
                                </form>

                                <form action="http://192.168.56.1/front_end/html/bulletin/reply/delete_reply.php"
                                      method="POST">
                                    <input type="hidden" name="bno" value="<?php echo $bno; ?>"/>
                                    <input type="hidden" name="rno" value="<?php echo $rno; ?>"/>
                                    <a href="#" onclick="this.parentNode.submit()">삭제</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                    <!--                    < 댓글 수정 폼 dialog-->
                    <div class="reply_modify_input">
                        <form action="http://192.168.56.1/front_end/html/bulletin/reply/modify_reply.php"
                              method="post">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-inline mb-2">
                                        <div><i class="fa fa-user-circle-o fa-2x"></i><b> test 1</b></div>
                                    </div>
                                    <input type="hidden" name="rno" value="<?php echo $rno; ?>"/>
                                    <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                              name="reply_content"
                                              placeholder="내용을 입력해주세요."><?php echo $content; ?></textarea>
                                    <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="수정">
                                    <input type="button" onclick="window.location.reload()"
                                           class="btn btn-sm btn-outline-secondary mt-3" value="취소">
                                </li>
                            </ul>
                        </form>
                    </div>

                    <!--                    대댓글 쓰기 -->
                    <div class="reply_reply_input">
                        <form action="http://192.168.56.1/front_end/html/bulletin/reply/register_child_reply.php"
                              method="post">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-inline mb-2">

                                        <div><i class="fa fa-user-circle-o fa-2x"></i><b> test 1</b></div>
                                    </div>
                                    <input type="hidden" name="bno" value="<?php echo $bno; ?>"/>
                                    <input type="hidden" name="rno" value="<?php echo $rno; ?>"/>
                                    <!--                                    group_no 댓글 그룹의 아이디값.-->
                                    <input type="hidden" name="g_no" value="<?php echo $reply['reply_group_no']; ?>">
                                    <input type="hidden" name="g_seq" value="<?php echo $reply['reply_group_seq']; ?>">
                                    <input type="hidden" name="g_depth"
                                           value="<?php echo $reply['reply_group_depth']; ?>">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                              name="reply_reply_content"
                                              placeholder="내용을 입력해주세요."></textarea>
                                    <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="등록">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>


                <?php
            }
            ?>


            <!--                        댓글 입력부분.-->
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


        <form action="http://192.168.56.1/front_end/html/bulletin/add_branch/add_child_post.php" method="POST">
            <input type="hidden" name="bno" value="<?php echo $bno; ?>"/>
            <input type="submit" class="btn btn-outline-secondary" value="답글쓰기">
        </form>

    </div>


</section>

</body>


</html>
