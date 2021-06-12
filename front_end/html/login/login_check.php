<?php
///////MYSQL 연결///////
$conn = mysqli_connect("127.0.0.1","root",'tpwnd2315!');
mysqli_select_db($conn ,'php-basic-project');
$result = mysqli_query($conn, 'SELECT * FROM `php-basic-project`.member_info_table');
?>

<?php

////post로 넘겨받은 데이터가 둘 중 하나라도 없다면 전 화면으로 돌아가는 예외처리 ///

if ($_POST["login_id"]== "" || $_POST["login_pw"]==""){
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
    return ;
}
while ($row = mysqli_fetch_assoc($result)){
    if($row['id']==$_POST["login_id"]&& $row['pw']==$_POST["login_pw"] ) {
        echo '<script> alert("로그인에 성공하였습니다."); location.href="http://192.168.56.1/front_end/html/cafe/main_page.php"; </script>';
    }
}
if( $row['id']!=$_POST["login_id"] || $row['pw']!=$_POST["login_pw"] ){
    echo '<script> alert("아이디, 비밀번호를 확인해주세요."); history.back(); </script>';

}


?>