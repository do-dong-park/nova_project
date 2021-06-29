<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>메뉴 목록</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/menu/menu_list.css">
    <link rel="stylesheet" href="/front_end/common/footer/common_footer.css">


</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php";
$menu_classify = $_GET['menu_category'];
?>

<section class="menu_list">

    <div class="banner_image">
        <!--alt 이미지를 띄울 수 없는 경우, 표시 대체할 문구-->
        <img src="../../img/원두%20사진/원두_배너.png" class="coffee-menu-banner img-fluid" alt="이미지를 출력할 수 없습니다.">
    </div>

    <div class="coffee-menu-body">

        <div class="coffee-menu-tabBar">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link <?php if(!isset($menu_classify)) { echo 'active';} ?>" id="전체보기-tab" data-bs-toggle="tab" data-bs-target="#전체보기" type="button" role="tab" aria-controls="전체보기" aria-selected="true" onclick="location.href='/front_end/html/menu/menu_list.php'">전체보기</button>
<!--                    <a class="nav-link active" aria-current="page" href="/front_end/html/menu/menu_list.php">전체 보기</a>-->
                </li>

                <li class="nav-item">
<!--                    <a class="nav-link"  href="/front_end/html/menu/menu_list.php?menu_category=1">커피</a>-->
                    <button class="nav-link <?php if($menu_classify==1) { echo 'active';} ?>" id="커피-tab" data-bs-toggle="tab" data-bs-target="#커피" type="button" role="tab" aria-controls="커피" aria-selected="false" onclick="location.href='/front_end/html/menu/menu_list.php?menu_category=1'" >커피</button>
                </li>

                <li class="nav-item">
<!--                    <a class="nav-link" href="/front_end/html/menu/menu_list.php?menu_category=2">차 / 음료</a>-->
                    <button class="nav-link <?php if($menu_classify==2) { echo 'active';} ?>" id="차-tab" data-bs-toggle="tab" data-bs-target="#차" type="button" role="tab" aria-controls="차" aria-selected="false"  onclick="location.href='/front_end/html/menu/menu_list.php?menu_category=2'" >차 / 음료</button>
                </li>

                <li class="nav-item">
                    <!--                    <a class="nav-link" href="/front_end/html/menu/menu_list.php?menu_category=2">차 / 음료</a>-->
                    <button class="nav-link <?php if($menu_classify==3) { echo 'active';} ?>" id="차-tab" data-bs-toggle="tab" data-bs-target="#차" type="button" role="tab" aria-controls="차" aria-selected="false"  onclick="location.href='/front_end/html/menu/menu_list.php?menu_category=3'" >푸드</button>
                </li>

            </ul>

        </div>

        <?php

        if (isset($_COOKIE['today_view'])) { ?>
            <div class="recent_menu" >
                <div>

                    <div style="text-align: center;">
                        최근본상품
                        <?php
                        //                쿠키 배열에 오늘 본 상품의 아이디들을 담는다.
                        if (isset($_COOKIE['today_view'])) {
                            $cookieArray = explode(",", $_COOKIE['today_view']);
                            $cookieCount = sizeof($cookieArray);
                            ?>
                            <?php
                        }
                        ?>
                        <br>
                        <div style="text-align: center;">
                            <div class="scrollbarauto">
                                <?php
                                if (isset($_COOKIE['today_view'])) {
//                                    쿠키가 있으면, 가장 최근에 쌓인 쿠키부터 3개만 고른다.
                                    for ($i = $cookieCount - 1; $i > $cookieCount -4; $i--) {
                                        if ($cookieArray[$i] !== "") {
                                            $sql = mq("select * from php_real_project.menu_info as mi join php_real_project.menu_img_info as mii where mi.menu_no = '".$cookieArray[$i]."' and mi.file_no = mii.file_no  ");
                                            while ($recent_menu = $sql->fetch_array()) {
                                                echo '
                                            <a href="/front_end/html/menu/menu-item.php?menu_id=' . $recent_menu['menu_no'] . '" >
                                                <img src="/' . $recent_menu['file_path'] . '" width="80" height="80" ><br>
                                                <span>' . $recent_menu['menu_name_kr'] . '</span>
                                                </a>
                                        <br>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <div class="coffee-menu-item-list row row-cols-1 row-cols-md-5 g-4">


            <?php

            if (isset($menu_classify)) {
                $sql = mq("select mi.menu_no, mi.menu_category, mi.menu_name_kr, mi.ice_hot, mii.file_path  from php_real_project.menu_info as mi join php_real_project.menu_img_info as mii where mii.file_no = mi.file_no and mi.menu_category = '" . $menu_classify . "' ");

            } else {
                $sql = mq("select mi.menu_no, mi.menu_category, mi.menu_name_kr, mi.ice_hot, mii.file_path  from php_real_project.menu_info as mi join php_real_project.menu_img_info as mii where mii.file_no = mi.file_no ");

            } ?>

            <?php

            // board테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
            //            $sql = mq("select * from php_real_project.board_info where category=0 order by board_no desc limit 0,10");

            while ($menu = $sql->fetch_array()) {
                $menu_id = $menu['menu_no'];
                $menu_category = $menu['menu_category'];
                $menu_name = $menu['menu_name_kr'];
                $menu_path = $menu['file_path'];


                ?>
                <div class="col">
                    <div class="card">
                        <a href="/front_end/html/menu/menu-item.php?menu_id=<?php echo $menu_id ?>">
                            <img src='/<?php echo $menu_path; ?>' class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $menu_name; ?></h5>
                            </div>
                        </a>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>




</section>

<?php
require_once "../../common/footer/common_footer.php"
?>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script>
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

<script src="https://kit.fontawesome.com/1059f71d3d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<script src="/front_end/common/nav_bar/my-nav-bar-bootstrap.js" crossorigin="anonymous"></script>

</body>
</html>