<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php";
session_start(); ?>

<?php
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$sql = mq("select bi.board_no, mi.id from php_real_project.board_info as bi join php_real_project.member_info as mi where bi.writer_code = mi.member_no and bi.board_no=$bno and bi.board_category=0"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
?>




    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="EUC-KR">
        <title>Child</title>

    </head>
    <body>
    </body>
    </html>

<?php
if( $_SESSION['user_id'] === $board['id'] || $_SESSION['user_id'] === 'admin') { ?>
    <script>location.href='http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=<?php echo $bno; ?>'</script>
<?php } else { ?>
    <script type="text/javascript">alert('작성자 혹은 관리자만 조회 가능한 글입니다.'); history.back(); </script>
<?php } ?>


<?php
//
//$bpw = $board['pw'];
//
//if(isset($_POST['pw_chk'])) //만약 pw_chk POST값이 있다면
//{
//    $pwk = $_POST['pw_chk']; // $pwk변수에 POST값으로 받은 pw_chk를 넣습니다.
//    if($pwk==$bpw) //다시 if문으로 DB의 pw와 입력하여 받아온 bpw와 값이 같은지 비교를 하고
//    {
//        ?>
<!--        <script type="text/javascript">opener.parent.location='http://192.168.56.1/front_end/html/bulletin/view-post.php?idx=--><?php //echo $bno; ?>
        <?php
//    }else{ ?>
<!--
    --><?php //} } ?>