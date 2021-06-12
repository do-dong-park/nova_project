<!DOCTYPE html>
<html>
<head>

    <title>남자 옷가게</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index.css">

    <style>

        .form-group {
            margin-top: 60px;
        }


    </style>

</head>
<body>


<div class="companyname text-center">
    <h1><a href="http://127.0.0.1/mywebsite/index.php" style="color: #111111">Mans Shop</a></h1>
</div>


<div class="container">
    /////post를 이용하여 register.php로 데이터를 보내준다.

    <form class="form-horizontal" action="register.php" method="post" role="form">

        <h2 id="signup">회원가입</h2>

        //// name= post로 넘겨주는 데이터의 id /////

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">이름*</label>
            <div class="col-sm-9">
                <input type="text" name="name" placeholder="이름을 입력해주세요." class="form-control" autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">아이디* </label>
            <div class="col-sm-9">
                <input type="id" placeholder="아이디를 입력해주세요." class="form-control" name="id">
            </div>
        </div>

        <div class="form-group">
            <label for="pw" class="col-sm-3 control-label">비밀번호*</label>
            <div class="col-sm-9">
                <input type="password" placeholder="비밀번호를 입력해주세요." class="form-control" name="pass">
            </div>
        </div>
        <div class="form-group">
            <label for="pwcheck" class="col-sm-3 control-label">비밀번호 확인 *</label>
            <div class="col-sm-9">
                <input type="password" placeholder="비밀번호를 확인해주세요." class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="birthDate" class="col-sm-3 control-label">생년월일*</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="birth">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">핸드폰 번호* </label>
            <div class="col-sm-9">
                <input type="phoneNumber" placeholder="핸드폰번호를 입력해주세요." class="form-control" name="phone">

            </div>
        </div>

        <div class="form-group">
            <label for="address" class="col-sm-3 control-label">주소* </label>
            <div class="col-sm-9">
                <input type="address" name="address" placeholder="" class="form-control">

            </div>
        </div>


        <div class="col-sm-">
            <button type="submit" id="registerok" class="btn btn-primary" style="margin-top:3%">회원가입 완료</button>
        </div>
    </form> <!-- /form -->
</div> <!-- ./container -->


</body>
</html>

<?php
