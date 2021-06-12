<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">

    <title>메뉴 소개</title>
    <link rel="stylesheet" href="../../css/menu/menu_item.css">

</head>
<body>
<nav class="my-navbar">
    <ul class="my-navbar_menu">
        <li><a href="">카페 정보</a></li>
        <li><a href="">메뉴</a></li>
        <li><a href="">Q&A</a></li>
        <li><a href="">공지사항</a></li>
    </ul>

    <div class="my-navbar_logo">
        <i class="fas fa-coffee"></i>
        <a href="">카페 토성</a>
    </div>

    <ul class="my-navbar_icons">
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fas fa-share-alt-square"></i></a></li>
        <li><a href="#"><i class="fas fa-sign-in-alt"></i></a></li>
    </ul>

    <a href="#" class="my-navbar_toggleBtn">
        <i class="fas fa-bars"></i>
    </a>
</nav>

<!--상품 소개 페이지 시작-->
<section class="menu-info-section">


    <!--이미지가 들어갈 공간 / 정사각형에 배경은 어두운 녹색~검정색-->
    <!--배경색 혹은 사진 크기 지정할 때 필요한 액자 (div)-->
    <div class="menu-image-frame">
        <div class="menu-img-box">
            <img src="../../img/음식 사진/커피 이미지 샘플.png" height="300" width="300"/>
            <!--<img src="../../img/커피%20이미지%20샘플.png" class="card-img-top" alt="">-->
        </div>

    </div>


    <!--메뉴의 정보가 들어갈 부분 제목과 설명으로 구성된다.-->
    <div class="menu-info-script">

        <!--폰트는 크고 굵게! 설명은 작고 얇게!-->
        <div class="menu-title-frame">
            <b class="menu-title-text">아메리카노</b>
        </div>

        <div class="menu-description">
            <b>이것은 아메리카노입니다.</b>

        </div>

    </div>

</section>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://kit.fontawesome.com/1059f71d3d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>

</html>