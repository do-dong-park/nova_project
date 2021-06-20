<nav class="navbar">
    <ul class="navbar_menu">
        <li><a href="http://192.168.56.1/front_end/html/cafe/cafe_info.php">카페 정보</a></li>
        <li><a href="http://192.168.56.1/front_end/html/menu/menu_list.php">메뉴</a></li>
        <li><a href="http://192.168.56.1/front_end/html/bulletin/Q&A.php">Q&A</a></li>
        <li><a href="http://192.168.56.1/front_end/html/bulletin/Community.php">자유 게시판</a></li>
    </ul>

    <div class="navbar_logo">
        <i class="fas fa-coffee"></i>
        <a href="http://192.168.56.1/front_end/html/cafe/main_page.php">카페 토성</a>
    </div>

    <ul class="navbar_icons">

        <li><a href="#" onclick="window.open('https://www.instagram.com/cafe_tosung/')">
                <i class="fab fa-instagram"></i></a>
        </li>
        <li><i class="fas fa-share-alt-square"></i></li>


        <script>
            var my_nickname = "<?php echo $_POST['nickname']; ?>";
            var my_id = "<?php echo $_POST['id']; ?>";
            var url = "http://192.168.56.1/front_end/html/login/check-my-profile.php";
            var show_my_profile = {id:my_id, nickname: my_nickname};
        </script>

        <?php
        if ($_POST["logined"]) {
            $nickname = $_POST['nickname'];
//            a 링크 태그에 post 넣기
            echo '
                    <div class="logined_profile">
                        <div class="helloUser">' . $_POST['nickname'] . '님 환영합니다.</div>
                        <div class="outAndUpdate">
                     
                            <a href="javascript:void(0);" onclick="post_to_url(url,show_my_profile);">내 정보</a> |
                            <a href="http://192.168.56.1/front_end/html/cafe/main_page.php">로그아웃</a>  
                        </div>
                    </div>';
        } else {
            echo '<li><a href="http://192.168.56.1/front_end/html/login/login.php"><i class="fas fa-sign-in-alt"></i></a></li>';
        }
        ?>


    </ul>

    <a href="#" class="navbar_toggleBtn">
        <i class="fas fa-bars"></i>
    </a>
</nav>

<script>
    //-함수의 입력값에 배열을 넣어서 배열에 post로 보낼 값(key : value)을 담는다.
    //함수 예시) post_to_url("/sports_shop/web_page/additempage.php", {'edit': 1,'id':<?=$id?>})
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
    }


</script>

