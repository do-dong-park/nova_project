<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<section class="n-section-block">

    <header class="n-section-title first info_views-area">
        <h1 class="tit">기본 회원정보 <span>필수</span></h1>
        <button class="n-btn btn-sm btn-default">회원 정보 수정</button>
    </header>

    <table class="n-table table-row my-info-modify">

        <colgroup>
            <col style="width:190px">
            <col style="width:*">
            <col style="width:50%">
        </colgroup>

        <tbody>
        <tr class="my-info-img" id="profile-image-area">

            <th scope="row">
                사진
            </th>

            <td>
                <div>
                    <!--기본 이미지 들어갈 공간-->
                </div>

            </td>
        </tr>

        <tr>
            <th scope="row">아이디</th>
            <td colspan="2"><strong><?php echo $_POST["id"]; ?></strong></td>
        </tr>

        <tr id="password-area">
            <th scope="row">비밀번호</th>
            <td><strong><?php echo $_POST["pw"]; ?></strong></td>
        </tr>

        <tr>
            <th scope="row">이름(실명)</th>
            <td>
                <strong>박*규</strong>
            </td>
        </tr>

        <tr id="nickName-area">
            <th scope="row">닉네임</th>
            <td><strong>성명 박동규</strong></td>
        </tr>

        <tr id="email-area">
            <th scope="row">이메일</th>
            <td>
                <strong id="currentEmail" value="rnlgkscl****@*****.com">rnlgkscl****@*****.com</strong>

            </td>
        </tr>
        </tbody>
    </table>
</section>

</body>
</html>