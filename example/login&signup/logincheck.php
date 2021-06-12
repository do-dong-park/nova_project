<?php
///////MYSQL 연결///////
$conn = mysqli_connect("로컬호스트","계정",'비밀번호');
mysqli_select_db($conn ,'데이터베이스 이름 ');
$result = mysqli_query($conn, 'SELECT * FROM 테이블이름');
?>

<?php

////post로 넘겨받은 데이터가 둘 중 하나라도 없다면 전 화면으로 돌아가는 예외처리 ///

if ($_POST["userid"]== "" || $_POST["userpw"]==""){
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
    return ;
}
while ($row = mysqli_fetch_assoc($result)){
    if($row['id']==$_POST["userid"]&& $row['pass']==$_POST["userpw"] ) {
        echo '<script> alert("로그인에 성공하였습니다."); location.href="index.php"; </script>';
    }
}
if( $row['id']!=$_POST["userid"] || $row['pass']!=$_POST["userpw"] ){
    echo '<script> alert("아이디, 비밀번호를 확인해주세요."); history.back(); </script>';

}


?>