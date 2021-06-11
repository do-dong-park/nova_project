<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/login/find_account.css">
  <title>회원 정보 찾기</title>

</head>
<body>
<section class="signup">
  <div class="goBack">

  </div>

  <!--로그인 로고-->
  <div class="find_account_title">
    <Strong>카페 토성</Strong>
  </div>

<!--  아이디 비밀번호 찾기 탭바 메뉴 -->
  <div class="select_tab">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">ID 찾기</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">PW 찾기</a>
      </li>
    </ul>
  </div>

  <!-- 회원 정보 찾는 부분 -->
  <div class="find_account">

    <div class="Id">
      <label for="id_input" class="form-label">ID</label>
      <input type="text" class="form-control" id="id_input" placeholder="아이디">
    </div>

    <div class="email">
      <!--input id에 대해 label을 적용합니다.-->
      <label for="email_input" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email_input" placeholder="name@example.com">
    </div>

  </div>

  <div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn btn-primary" type="button">아이디 찾기</button>
  </div>

</section>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>