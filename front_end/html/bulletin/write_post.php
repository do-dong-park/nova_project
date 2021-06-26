<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>글 작성</title>
    <?php
    require_once "../../common/bootstrap&icon&font.php"
    ?>
    <link rel="stylesheet" href="../../common/nav_bar/my_nav_bar.css">
    <link rel="stylesheet" href="../../css/bulletin/write_post.css">
    <script src="../../common/nav_bar/my-nav-bar-bootstrap.js" defer></script>
<!--   내가 만든 빌드-->
<!--    <script type="module" src="http://192.168.56.1/src/ckeditor5/src/ckeditor.js"></script>-->
<!--    ckeditor 기본적인 빌드-->
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

</head>
<body>

<?php
require_once "../../common/nav_bar/my-navbar-include.php"
?>

<section class="QnA-write-section">

    <?php
    if($_GET['community']==1) {
        $title = "게시글 작성";
        $post_type = 1;
    } else {
        $title = "문의 작성";
        $post_type = 0;
    }

    ?>


    <form action="register_post.php" method="post">
        <div class="QnA-write-main-title">
            <h3 class="title"><?php echo $title ?></h3>
            <button class="register-post btn btn-outline-secondary btn-sm" type="submit">등록</button>
        </div>

        <div class="QnA-input-area">

            <input type="hidden" name="post_type" value="<?php echo $post_type ?>">
            <input class="form-control QnA-input-title" name="title" type="text" placeholder="제목을 입력해주세요."
                   aria-label="">

            <div class="QnA-input-description">
                <!-- 2. TEXT 편집 툴을 사용할 textarea -->
                <textarea class="description" name="content" id="editor"></textarea>
            </div>

            <div class="is_secret form-check">
                <input class="form-check-input" type="checkbox" name="lock_post" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    비밀글 설정
                </label>
            </div>

        </div>


    </form>


</section>

<script>
    // import Image from '@ckeditor/ckeditor5-image/src/image';

    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: 'http://192.168.56.1/src/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                options: {
                    resourceType: 'Images'
                }
            },
        })
        .catch(error => {
            console.error(error);
        });




    // ====================== 이미지 resize가 들어간 번들 =========== 실행 안됨.
    // import ImageResize from '@ckeditor/ckeditor5-image/src/imageresize';
    // ClassicEditor
    //     .create( document.querySelector( '#editor' ), {
    //         // plugins: [ ImageResize ],
    //         ckfinder: {
    //             uploadUrl: 'http://192.168.56.1/src/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
    //             options :  {
    //                 resourceType :  'Images'
    //             } },
    //
    //         image: {
    //             // Configure the available styles.
    //             styles: [
    //                 'alignLeft', 'alignCenter', 'alignRight'
    //             ],
    //
    //             // Configure the available image resize options.
    //             resizeOptions: [
    //                 {
    //                     name: 'resizeImage:original',
    //                     label: 'Original',
    //                     value: null
    //                 },
    //                 {
    //                     name: 'resizeImage:50',
    //                     label: '50%',
    //                     value: '50'
    //                 },
    //                 {
    //                     name: 'resizeImage:75',
    //                     label: '75%',
    //                     value: '75'
    //                 }
    //             ],
    //
    //             // You need to configure the image toolbar, too, so it shows the new style
    //             // buttons as well as the resize buttons.
    //             toolbar: [
    //                 'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
    //                 '|',
    //                 'resizeImage',
    //                 '|',
    //                 'imageTextAlternative'
    //             ]
    //         }
    //     } )
    //     .then( editor => {
    //     console.log( 'Editor was initialized', editor );
    // } )
    //     .catch( error => {
    //         console.error(error.stack);
    //     });

</script>


</body>
</html>
