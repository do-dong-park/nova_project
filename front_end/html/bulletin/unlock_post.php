<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php"; ?>
<?php
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$sql = mq("select bi.board_no, mi.pw from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.writer_code = mi.member_no and bi.board_category=0"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="EUC-KR">
        <title>Child</title>

    </head>
    <body>

    <form action="" method="post">
        <h4>비밀글 조회를 위해 비밀번호를 입력해주세요</h4>
        <p>비밀번호<input type="password" name="pw_chk" /> <input type="submit" value="확인" /></p>
    </form>
    </body>
    </html>

<?php

$bpw = $board['pw'];

if(isset($_POST['pw_chk'])) //만약 pw_chk POST값이 있다면
{
    $pwk = $_POST['pw_chk']; // $pwk변수에 POST값으로 받은 pw_chk를 넣습니다.
    if($pwk==$bpw) //다시 if문으로 DB의 pw와 입력하여 받아온 bpw와 값이 같은지 비교를 하고
    {
        ?>
        <script type="text/javascript">opener.parent.location='http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $bno; ?>';

            window.close();</script><!-- pwk와 bpw값이 같으면 read.php로 보내고 -->
        <?php
    }else{ ?>
        <script type="text/javascript">alert('비밀번호가 틀립니다');</script><!--- 아니면 비밀번호가 틀리다는 메시지를 보여줍니다 -->
    <?php } } ?>