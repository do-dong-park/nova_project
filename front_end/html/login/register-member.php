<?php

///데이터베이스 연결.////
$conn = mysqli_connect("127.0.0.1", "root", 'tpwnd2315!');
mysqli_select_db($conn, 'php-real-project');


//회원가입 조건 충족 못하면,
if ($_POST["id"] == "" || $_POST["pw"] == "" || $_POST["name"] == "" || $_POST["nickname"] == "" || $_POST["email"] == "") {
    echo '<script> alert("필수 정보를 모두 입력해주세요"); history.back(); </script>';
    return;
} else if ($_POST["pw"] != $_POST["pw_conf"]) {
    echo '<script> alert("비밀번호가 일치하지 않습니다."); history.back(); </script>';
    return;
} else {
    echo '<script> alert("회원가입을 완료했습니다."); location.href="http://192.168.56.1/front_end/html/cafe/main_page.php"; </script>';

    //닉네임 입력 안하면, 이름을 닉네임으로, 데이터 베이스 저장 (중복되지 않을 임의 값을 닉네임으로 주는 것도 생각할 것.) ///////
    $sql = "INSERT INTO php_real_project.member_info  (id,pw,name,nickname,email,file_no,register_date,member_category) VALUES( '{$_POST['id']}', '{$_POST['pw']}','{$_POST['name']}','{$_POST['nickname']}','{$_POST['email']}',null,now(),0)";


    $result = mysqli_query($conn, $sql);

    $conn->close();
}








