<?php

/////데이터베이스 연결.////
$conn = mysqli_connect("127.0.0.1","root",'tpwnd2315!');
mysqli_select_db($conn ,'php-basic-project');

if ($_POST["id"]== "" || $_POST["pw"]==""){
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
    return ;
}

////데이터 베이스 저장 ///////
$sql = "INSERT INTO `php-basic-project`.member_info_table  (id,pw,name,nickname,email) VALUES(
    '{$_POST['id']}', '{$_POST['pw']}','{$_POST['name']}','{$_POST['nickname']}','{$_POST['email']}'                                                                       
)";

$result = mysqli_query($conn,$sql);

echo '<script> alert("회원가입을 완료했습니다."); location.href="http://192.168.56.1/front_end/html/cafe/main_page.php"; </script>';

