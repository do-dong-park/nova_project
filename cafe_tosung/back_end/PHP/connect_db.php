<?php
//페이지에서 받은 별명으로부터, 회원정보를 추출하여, 표에 값으로 뿌려줌.
///데이터베이스 연결.////
header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

// localhost = DB주소, web=DB계정아이디, 1234=DB계정비밀번호, post_board="DB이름"
$db = new mysqli("127.0.0.1", "root", 'tpwnd2315!','php_real_project');
$db->set_charset("utf8");

function mq($sql)
{
    global $db;
    return $db->query($sql);
}
?>