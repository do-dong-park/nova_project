<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";
session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 보기</title>
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
//이 글에 대한 정보를 DB로부터, 가져옴.
$sql = mq("select bi.board_no, bi.title,bi.content, mi.nickname,mi.id, bi.CreateDate, bi.board_category from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.board_no='" . $bno . "' and mi.member_no = bi.writer_code "); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();

$sql2 = mq("select *  from php_real_project.reply join member_info mi on mi.member_no = reply.comment_writer  where board_no = '". $bno."' order by reply_group_no asc, reply_group_depth asc,  reply_group_seq DESC ");
$rep_count = mysqli_num_rows($sql2);

$hit = mq("UPDATE php_real_project.board_info set hit=hit+1 where board_no = '".$bno."'")
?>

<section class="QnA-view-section">

    <!--    글 제목 위에 있는 버튼들-->
    <div class="control_post">

<!--        내가! 관리자거나, 작성자라면, 글을 편집할 수 있는 권한을 갖습니다.-->
        <?php
//        닉네임은 변경이 가능 하기 때문에, 아이디로 게시글의 권한을 파악한다.
        if ( $_SESSION['user_id'] === $board['id'] || $_SESSION['user_id'] === 'admin') { ?>

            <!--        내가 쓴 글이거나 관리자라면, 수정 삭제가 가능해야 함.-->
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

        <?php } ?>





<!--이전글 다음글-->
            <?php
            $board_category = $board['board_category'];
            if($board_category== 0) {
                $gotoList = 'http://192.168.56.1/front_end/html/bulletin/Q&A.php';
            } else {
                $gotoList = 'http://192.168.56.1/front_end/html/bulletin/Community.php';
            }

            $next=mq("SELECT board_no, board_category FROM php_real_project.board_info BI WHERE board_no > '".$bno."' and board_category = '".$board_category."'  ORDER BY board_no LIMIT 1");
            $next = $next->fetch_array();
            $next_no=$next['board_no'];

            $prev=mq("SELECT board_no, board_category FROM php_real_project.board_info BI WHERE board_no < '".$bno."' and board_category = '".$board_category."'  ORDER BY board_no DESC LIMIT 1");
            $prev = $prev->fetch_array();
            $prev_no=$prev['board_no'];

            if(!$bno) {
                echo "<script>
    alert('글이 존재하지 않습니다.');
    history.back();</script>";
            }?>

        <div class="right_btn">
            <button class="right_btn list-post btn btn-sm btn-outline-secondary"
                    onclick="location.href = '<?php echo $gotoList ?>' ">목록
            </button>

            <button class="right_btn next-post btn btn-sm btn-outline-secondary" onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $next_no; ?>'">

                다음 글
            </button>

            <button class="right_btn previous-post btn btn-sm btn-outline-secondary" onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $prev_no; ?>'">
                이전 글
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

            <!--                        댓글 입력부분.-->
            <div class="reply_input">
                <form action="http://192.168.56.1/front_end/html/bulletin/reply/register_reply.php" method="post">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">

<!--댓글 작성할 때 내 정보 부분.-->
                                <?php if(isset($_SESSION['user_id'])) {
//                                    작성자와 관리자만 댓글을 달 수 있습니다.
                                    if($_SESSION['user_name'] === 'admin' || $_SESSION['user_name'] === $board['nickname']) { ?>
                                        <div class="form-inline mb-2">
                                            <div><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $_SESSION['user_name']; ?></b></div>
                                            <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                      name="reply_content"
                                                      placeholder="내용을 입력해주세요."></textarea>
                                            <input type="submit" class="btn btn-sm btn-outline-secondary mt-3" value="등록">
                                        </div>
                                    <?php } else { ?>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                  name="reply_content"
                                                  placeholder="작성자와 관리자만 댓글 작성이 가능합니다."  disabled></textarea>
                                        <input type="submit" class="btn btn-sm btn-outline-secondary mt-3 disabled" value="등록" >
                                    <?php }?>

                                <?php } else { ?>

                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                              name="reply_content"
                                              placeholder="로그인 이후에 댓글 작성이 가능합니다."  disabled></textarea>
                                    <input type="submit" class="btn btn-sm btn-outline-secondary mt-3 disabled" value="등록" disabled>


                                <?php } ?>



                        </li>
                    </ul>
                </form>
            </div>

            <!--            댓글 목록-->
            <?php
            // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시

//            $sql2 = mq("select *  from php_real_project.reply where board_no = '" . $bno . "' ");

            while ($reply = $sql2->fetch_array()) {

                $commenter_nickname = $reply['nickname'];
                $commenter_id = $reply['id'];
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

                <?php
                if($board_category == 0) {


                } else {


                }
                ?>


                <div class="reply_list" style="padding-left:<?php echo ($g_depth-1)*20; ?>px">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="form-inline mb-2">
                                <div><?php echo $indent; ?><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $commenter_nickname; ?></b></div>
                            </div>
                            <div class="dap_to comt_edit"><?php echo nl2br("$reply[reply_content]"); ?></div>
                            <input type="hidden" name="bno" value="<?php echo $bno; ?>">
                            <div><?php echo $time; ?> </div>
                            <div class="reply_control">
                                <?php if(isset($_SESSION['user_id'])) { ?>
                                    <a class="add_child_reply" href="#" onclick="return false">답글 쓰기</a>
                                <?php } ?>
                                <!--        내가! 관리자거나, 댓글 작성자라면, 댓글을 편집할 수 있는 권한을 갖습니다.-->
                                <?php
                                //        닉네임은 변경이 가능 하기 때문에, 아이디로 게시글의 권한을 파악한다.
                                if ( $_SESSION['user_id'] === 'admin' || $_SESSION['user_id'] === $commenter_id) { ?>

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

                                <?php } ?>


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
                                        <div><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $commenter_nickname; ?></b></div>
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

                                        <div><i class="fa fa-user-circle-o fa-2x"></i><b><?php echo $_SESSION['user_name']; ?></b></div>
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


        </div>

    </div>

    <!--글 아래 조그만한 게시판 섹션-->
    <div class="board_bottom_btn">
        <button class="modify-post btn btn-outline-secondary"
            <?php
            if(isset($_SESSION['user_id'])) { ?>
                onclick="location.href = 'http://192.168.56.1/front_end/html/bulletin/write_post.php'"
            <?php } else { ?>
                onclick = "alert('로그인 후 글을 작성할 수 있습니다.'); return false;"
            <?php } ?> >글쓰기
        </button>


<!--        <form action="http://192.168.56.1/front_end/html/bulletin/add_branch/add_child_post.php" method="POST">-->
<!--            <input type="hidden" name="bno" value="--><?php //echo $bno; ?><!--"/>-->
<!--            --><?php
//            if(isset($_SESSION['user_id'])) { ?>
<!--                <input type="submit" class="btn btn-outline-secondary" value="답글쓰기">-->
<!--            --><?php //} else { ?>
<!--                <input type="button" class="btn btn-outline-secondary" onclick = "alert('로그인 후 글을 작성할 수 있습니다.'); return false;" value="답글쓰기">-->
<!--            --><?php //} ?>
<!---->
<!--        </form>-->

    </div>


</section>

</body>


</html>
