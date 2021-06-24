<nav class="my-navbar">
    <ul class="my-navbar_menu">
        <li><a href="http://192.168.56.1/front_end/html/cafe/cafe_info.php">카페 정보</a></li>
        <li><a href="http://192.168.56.1/front_end/html/menu/menu_list.php">메뉴</a></li>
        <li><a href="http://192.168.56.1/front_end/html/bulletin/Q&A.php">Q&A</a></li>
        <li><a href="http://192.168.56.1/front_end/html/bulletin/Community.php">자유 게시판</a></li>
    </ul>

    <div class="my-navbar_logo">
        <i class="fas fa-coffee"></i>
        <a href="http://192.168.56.1/front_end/html/cafe/main_page.php">카페 토성</a>
    </div>

    <ul class="my-navbar_icons">
        <li><a href="#" onclick="window.open('https://www.instagram.com/cafe_tosung/')"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fas fa-share-alt-square"></i></a></li>
        <script>
            var my_nickname = "<?php echo $_POST['nickname']; ?>";
            var my_id = "<?php echo $_POST['id']; ?>";
            var url = "http://192.168.56.1/front_end/html/login/check-my-profile.php";
            var show_my_profile = {id:my_id, nickname: my_nickname};
        </script>

        <?php
        session_start();

        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            echo '
                    <div class="logined_profile">
                        <div class="helloUser">' .$user_name. '님 환영합니다.</div>
                        <div class="outAndUpdate">
                     
                            <a href="http://192.168.56.1/front_end/html/login/check-my-profile.php">내 정보</a> |
                            <a href="http://192.168.56.1/front_end/html/cafe/main_page.php">로그아웃</a>  
                        </div>
                    </div>';
        } else {
            echo '<li><a href="http://192.168.56.1/front_end/html/login/login.php"><i class="fas fa-sign-in-alt"></i></a></li>';
        }
        ?>
    </ul>

    <a href="#" class="my-navbar_toggleBtn">
        <i class="fas fa-bars"></i>
    </a>
</nav>
