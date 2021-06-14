<nav class="my-navbar">
    <nav class="navbar">
        <ul class="navbar_menu">
            <li><a href="http://192.168.56.1/front_end/html/cafe/cafe_info.php">카페 정보</a></li>
            <li><a href="http://192.168.56.1/front_end/html/menu/menu_list.php">메뉴</a></li>
            <li><a href="http://192.168.56.1/front_end/html/bulletin/Q&A.php">Q&A</a></li>
            <li><a href="http://192.168.56.1/front_end/html/bulletin/Community.php">공지사항</a></li>
        </ul>

        <div class="navbar_logo">
            <i class="fas fa-coffee"></i>
            <a href="http://192.168.56.1/front_end/html/cafe/main_page.php">카페 토성</a>
        </div>

        <ul class="navbar_icons">
            <li><a href="#" onclick="window.open('https://www.instagram.com/cafe_tosung/')"><i
                            class="fab fa-instagram"></i></a>
            </li>
            <li><i class="fas fa-share-alt-square"></i></li>

            <?php if ($_POST["logined"]) {
                echo '<div class="helloUser">' . $_POST['name'] . '님 환영합니다.</div>';
                echo '<div class="outAndUpdate">
<a href="../login/check-my-profile.php">내 정보</a>
 | 
 <a href="http://192.168.56.1/front_end/html/login/login.php">로그아웃</a>  
                        
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