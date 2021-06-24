<!-- 많이쓰는 함수 js파일 (제일 위 <?php ?>영역 밖에 입력 )-->
<script>
    //4.Post방식으로 데이터 넘겨주기
    //-함수의 입력값에 배열을 넣어서 배열에 post로 보낼 값(key : value)을 담는다.
    //함수 예시) post_to_url("/sports_shop/web_page/additempage.php", {'edit': 1,'id':""})
    function post_to_url(path, params, method) {
        //1)get, post 설정
        method = method || "post";
        //2)post를 보내기 위한 form 태그 생성
        var form = document.createElement("form");
        //3)form 태그 속성 설정
        //  -method 방식 설정
        //  -action: 경로 설정
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        //4)post로 보낼 데이터 배열의 갯수 만큼 반복
        for (var key in params) {
            //5)값을 담을 input태그 생성
            var hiddenField = document.createElement("input");
            //6)인풋 태그 속성 설정
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key); //키
            hiddenField.setAttribute("value", params[key]); //value
            //form 태그에 input태그를 넣는다.
            form.appendChild(hiddenField);
        }
        //7)전체 boby에 form태그를 넣는다.
        document.body.appendChild(form);
        //8)post로 값 보내기
        form.submit();
    }</script>;

<?php
///////MYSQL 연결///////
$conn = mysqli_connect("127.0.0.1", "root", 'tpwnd2315!');
mysqli_select_db($conn, 'php_real_project');
$result = mysqli_query($conn, 'SELECT * FROM php_real_project.member_info');


$id = $_POST["login_id"];
$pw = $_POST["login_pw"];

$get_info = mysqli_query($conn, "SELECT * FROM php_real_project.member_info WHERE id = '".$id."' ");

$row_info = mysqli_fetch_assoc($get_info);


?>

<script>
    var login_nickname = "<?php echo $row_info['nickname']; ?>";
    var login_id = "<?php echo $row_info['id']; ?>";
</script>

<?php
if ($_POST["login_id"] == "" || $_POST["login_pw"] == "") {
    echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';
    return;
}
while ($row = mysqli_fetch_assoc($result)) {

    if ($row['id'] == $_POST["login_id"] && $row['pw'] == $_POST["login_pw"]) {
        session_start();
        $_SESSION['user_id'] = $_POST["login_id"];
        $_SESSION['user_pw'] = $_POST["login_pw"];
        $_SESSION['user_name'] = $row_info['nickname'];

        echo '<script> alert("로그인에 성공하였습니다."); var login_info = {id: login_id, nickname: login_nickname, logined: "true"}; post_to_url("http://192.168.56.1/front_end/html/cafe/main_page.php",login_info); </script>';
    }
}

if ($row['id'] != $_POST["login_id"] || $row['pw'] != $_POST["login_pw"]) {
    echo '<script> alert("아이디, 비밀번호를 확인해주세요."); history.back(); </script>';

}
?>



