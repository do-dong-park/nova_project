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

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<?php
$item_type = $_GET['item_name'];

if($item_type == 'beverage') {
    $item_name = '음료 샘플';
    $item_content = '음료 설명';
    $item_img_path = '../../img/음식 사진/음료 이미지 샘플.png';

} elseif ($item_type == 'coffee') {
    $item_name = '커피 샘플';
    $item_content = '커피 설명';
    $item_img_path = '../../img/음식 사진/커피 이미지 샘플.png';

} else {
    $item_name = '푸드 샘플';
    $item_content = '푸드 설명';
    $item_img_path = '../../img/음식 사진/푸드 이미지 샘플.png';
}

?>

<!--상품 소개 페이지 시작-->
<section class="menu-info-section">
    <!--이미지가 들어갈 공간 / 정사각형에 배경은 어두운 녹색~검정색-->
    <!--배경색 혹은 사진 크기 지정할 때 필요한 액자 (div)-->
    <div class="menu-image-frame">
        <div class="menu-img-box">
            <img src="<?php echo $item_img_path; ?>" height="300" width="300"/>
            <!--<img src="../../img/커피%20이미지%20샘플.png" class="card-img-top" alt="">-->
        </div>

    </div>


    <!--메뉴의 정보가 들어갈 부분 제목과 설명으로 구성된다.-->
    <div class="menu-info-script">

        <!--폰트는 크고 굵게! 설명은 작고 얇게!-->
        <div class="menu-title-frame">
            <b class="menu-title-text"><?php echo $item_name; ?></b>
        </div>

        <div class="menu-description">
            <b><?php echo $item_content; ?></b>

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