<?php include $_SERVER['DOCUMENT_ROOT'] . "/back_end/PHP/connect_db.php"; ?>
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

<!--상품 소개 페이지 시작-->
<section class="">

    <?php
    $menu_id = $_GET['menu_id'];

//    echo $menu_id;

    $sql = mq("select mi.menu_no, mi.menu_category, mii.file_path, mi.menu_name_kr, mi.menu_name_en, mi.menu_description, mi.ice_hot, mii.file_path, ni.nutrient_no, ni.volume, ni.serving_size, ni.sugars, ni.fat, ni.protein, ni.na, ni.caffeine, ni.allergy  from php_real_project.menu_info as mi join php_real_project.menu_img_info as mii join php_real_project.nutrient_info as ni where  mi.menu_no = '".$menu_id."'  and mii.file_no = mi.file_no and ni.nutrient_no = mi.nutrient_no ");

    $menu_item = $sql->fetch_array();



    ?>


    <?php



    $cookiePno = $menu_id; // 여기서 $no는 상품번호이다.


    // 저장된 쿠키값이 없을 경우 새로 쿠키를 저장하는 소스
    if(!isset($_COOKIE['today_view'])){
        setcookie('today_view', $cookiePno, time() + 21600, "/");

    }



    if(isset($_COOKIE['today_view'])){ // today_view라는 쿠키가 존재하면

        $todayview=$_COOKIE['today_view']; // $todayview 변수에 today_view 쿠키를 저장한다.

        $tod2=explode(",", $_COOKIE['today_view']); // today_view 쿠키를 ','로 나누어 구분한다.

        $i=0;

        $tod=array_reverse($tod2); // 최근 목록으로 뽑기 위해 배열을 최신 것부터로 반대로 정렬해준다.




        // 중복 판별기

//        print_r($todayview);
        while($i<sizeof($tod)){ // $tod배열의 사이즈만큼 반복한다.

//            중복이 발생한 경우,
            if($cookiePno==$tod[$i]){

                $save='no';

                if($cookiePno == $tod[0]) {
                    $todayview = str_replace($tod[$i] , '', $todayview);
                    $is_add = '';
                } else {
                    $todayview = str_replace($tod[$i].',' , '', $todayview);
                    $is_add = ',';
                }




            }


            $i++;


        }

        if($save != 'no'){

            setcookie('today_view' , $todayview. "," . $cookiePno , time() + 21600, "/");

        } else {
            setcookie('today_view' , $todayview. $is_add . $cookiePno , time() + 21600, "/");
        }

        //저장된 쿠키값이 일정량 이상이면 초기화 하는 소스
        if(sizeof($tod)>10){

            setcookie('today_view' , $todayview. "," . $tod2[0] , time() - 3600, "/");


        }

//        print_r($todayview);


    }





    ?>
    <!--이미지가 들어갈 공간 / 정사각형에 배경은 어두운 녹색~검정색-->
    <!--배경색 혹은 사진 크기 지정할 때 필요한 액자 (div)-->

    <div class="menu-info-section">
        <div class="menu-image-frame">
            <div class="menu-img-box">
                <img src="/<?php echo $menu_item['file_path']; ?>" height="450" width="450"/>
<!--                <img src="../../img/커피%20이미지%20샘플.png" class="card-img-top" alt="">-->
            </div>

        </div>


        <!--메뉴의 정보가 들어갈 부분 제목과 설명으로 구성된다.-->
        <div class="menu-info-script">

            <!--폰트는 크고 굵게! 설명은 작고 얇게!-->
            <div class="myAssignZone">
                <h4><?php echo $menu_item['menu_name_kr']; ?><br><span><?php echo $menu_item['menu_name_en']; ?></span></h4>
                <p class="t1"><?php echo $menu_item['menu_description']; ?></p>
            </div>

            <form method="post">
                <fieldset>
                    <div class="product_view_info">
                        <div class="product_info_head">
                            <p class="tit">제품 영양 정보</p>
                            <span class="unit"><?php echo $menu_item['volume']; ?></span>
                        </div>
                        <div class="product_info_content">
                            <ul>
                                <li>
                                    <dl>
                                        <dt>1회 제공량 (kcal)</dt>
                                        <dd><?php echo $menu_item['serving_size']; ?></dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt>포화지방 (g)</dt>
                                        <dd><?php echo $menu_item['fat']; ?></dd>
                                    </dl>
                                </li>
                                <li class="last">
                                    <dl>
                                        <dt>나트륨 (mg)</dt>
                                        <dd><?php echo $menu_item['na']; ?></dd>
                                    </dl>
                                </li></ul>
                            <ul>
                                <li>
                                    <dl>
                                        <dt>당류 (g)</dt>
                                        <dd><?php echo $menu_item['sugars']; ?></dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt>단백질 (g)</dt>
                                        <dd><?php echo $menu_item['protein']; ?></dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt><?php if(isset($menu_item['caffeine'])) { echo '카페인 (mg)'; } ?></dt>
                                        <dd><?php echo $menu_item['caffeine']; ?></dd>
                                    </dl>
                                </li>


                            </ul>
                        </div>

                        <?php
                        if(isset($menu_item['allergy'])) { ?>
                            <div class="product_factor">
                                <p>알레르기 유발요인 : <?php echo $menu_item['allergy'] ?></p>
                            </div>
                        <?php } ?>

                    </div>

                </fieldset>
            </form>

        </div>
    </div>

    <?php
    require_once "../../common/footer/common_footer.php"
    ?>


</section>





<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://kit.fontawesome.com/1059f71d3d.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>

</html>