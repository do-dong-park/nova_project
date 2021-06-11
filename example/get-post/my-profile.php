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
<!-- 기본 회원정보 -->
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
                    <div class="img"
                         style="background-image: url(https://image.msscdn.net/mfile_s01/_simbols/_basic/r.png?20210612045740)"></div>
                </div>

                <p class="txt">회원님을 알릴 수 있는 사진을 등록해 주세요.<br>등록된 사진은 회원님의 게시물이나 댓글들에 사용됩니다.</p>
            </td>
        </tr>

        <tr>
            <th scope="row">아이디</th>
            <td colspan="2"><strong>rnlgksclsrn</strong></td>
        </tr>

        <tr id="password-area">
            <th scope="row">비밀번호</th>
            <td><strong>********</strong></td>
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