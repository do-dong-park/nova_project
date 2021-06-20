<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>카페 정보</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../common/nav_bar/nav_bar.css">
    <link rel="stylesheet" href="../../css/cafe/cafe_info.css">
    <link rel="stylesheet" href="/front_end/common/footer/common_footer.css">


</head>
<body>
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
        <li><a href="https://www.instagram.com/cafe_tosung/"><i class="fab fa-instagram"></i></a></li>
        <li><i class="fas fa-share-alt-square"></i></li>
        <li><a href="http://192.168.56.1/front_end/html/login/login.php"><i class="fas fa-sign-in-alt"></i></a></li>
    </ul>

    <a href="#" class="navbar_toggleBtn">
        <i class="fas fa-bars"></i>
    </a>
</nav>

<section class="Info_box">

    <ul class="Info_text">
        <li id="Info_title"><strong>Information</strong></li>
        <li>☕주소 : 충북 청주시 청원구 토성로 163-1</li>
        <li>⏰ 10:00-19:00 월-일 연중무휴</li>
        <li>👩🏻‍🍳 매장에서 직접 굽는 베이커리& all day brunch</li>
        <li>🌿700평규모야외정원,애견동반🆓입장료는없어요</li>
        <li>🚗주차 ~20대 가능</li>
    </ul>

    <div class="Info_map">
        <div id="daumRoughmapContainer1623262074092" class="root_daum_roughmap root_daum_roughmap_landing"></div>
    </div>

</section>

<?php
require_once "../../common/footer/common_footer.php"
?>

</body>

<script charset="UTF-8" class="daum_roughmap_loader_script"
        src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
    new daum.roughmap.Lander({
        "timestamp": "1623262074092",
        "key": "26653",
        "mapWidth": "640",
        "mapHeight": "360"
    }).render();
</script>
<script src="../../common/nav_bar/navbar.js"></script>
<script src="https://kit.fontawesome.com/1059f71d3d.js" crossorigin="anonymous"></script>
</html>