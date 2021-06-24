<?php
//메인 페이지에서 세션에 데이터가 있는지 열어 봄.
session_start();
// 쿠키에 있는 아이디 값을 저장?
$c_id = $_COOKIE["c_id"];
//로그인을 해서 쿠키를 갖고 있는 경우 세션에 내가 누군지를 저장함.
if ($c_id) {
    $query = "select * from member where member_id='$c_id'";
    $result = mysql_query($query);
    if(mysql_num_rows($result)) {
        $db = mysql_fetch_array($result);

        $_SESSION[m_id]        = $db[member_id];

    }
}

// 아래 다른
?>
<form name="f1" method="post">
    <div class="formGroup">
        <label>아이디</label>
        <input type="text" id="user_id" name="user_id" maxlength="20" style="text-indent:1em;" onKeyDown="if(event.keyCode == 13) loginChk()">
    </div>
    <div class="formGroup">
        <label>비밀번호</label>
        <input type="password" name="passwd" maxlength="20" style="text-indent:1em;" onKeyDown="if(event.keyCode == 13) loginChk()">
    </div>
    <button type="button" class="btnSubmit" onclick="loginChk()">로그인</button>
    <div class="checkWrap">
        <input type="checkbox" id="save" name="id_save" value="y" onclick="chk()">
        <label for="save"><span></span>아이디 저장</label>

        <input type="checkbox" id="auto_login" name="auto_login" value="y">
        <label for="auto_login"><span></span>자동로그인</label>
    </div>

</form>

<?php
session_start();
$auto_login        = trim($_POST[auto_login]);

$query = "select * from member where member_id='$user_id' and member_passwd='$passwd'";
$result = mysql_query($query);
if(mysql_num_rows($result)) {
    $db = mysql_fetch_array($result);

    if ($auto_login=="y") {

//        로그인할 때 자동로그인이 선택되어 있으면, 쿠키 이름에 변수값을 저장하고 기간을 표시한ㄷ.
        setcookie("c_id",$user_id,(time()+3600*24*30),"/"); // 한달간 자동로그인 유지
    }

// 아래 하단 소스 .....

}
?>
