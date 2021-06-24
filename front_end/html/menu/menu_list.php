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
require_once "../../common/nav_bar/my-navbar-include.php"
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
                    <a class="nav-link active" aria-current="page" href="#">전체 보기</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">커피</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">음료</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">푸드</a>
                </li>
            </ul>

        </div>

        <script>
            var beverage = "beverage";
            var coffee = "coffee";
            var food = "food";
            var show_item_profile1 = {item_name: beverage};
            var show_item_profile2 = {item_name: coffee};
            var show_item_profile3 = {item_name: food};
            var url = "http://192.168.56.1/front_end/html/menu/menu-item.php";
        </script>


        <div class="coffee-menu-item-list row row-cols-1 row-cols-md-5 g-4">

            <div class="col">
                <div class="card">
                    <a href="javascript:void(0);" onclick="post_to_url(url,show_item_profile1,'get');">
                        <img src="../../img/음료%20이미지%20샘플.png" class="card-img-top" alt="">

                        <div class="card-body">
                            <h5 class="card-title">음료 샘플1</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <a href="javascript:void(0);" onclick="post_to_url(url,show_item_profile2,'get');">
                        <img src="../../img/커피%20이미지%20샘플.png"
                             class="card-img-top"
                             alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">커피 샘플1</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <a href="javascript:void(0);" onclick="post_to_url(url,show_item_profile3,'get');">
                        <img src="../../img/음식%20사진/푸드%20이미지%20샘플.png"
                             class="card-img-top"
                             alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">푸드 샘플1</h5>
                    </div>
                </div>
            </div>

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