<?php

@session_start();
$result = session_destroy(); //세션을 닫아준다
//저장된 쿠키도 삭제시킴....
setcookie("user_id","",time(),"/");
setcookie("user_pw","",time(),"/");

if($result) { //세션닫기에 성공하면
    ?>
    <script>
        alert("로그아웃 되었습니다.");
        location.replace("http://192.168.56.1/front_end/html/cafe/main_page.php")//다시 처음 페이지로 돌아간다
    </script>
<?php   }
?>
