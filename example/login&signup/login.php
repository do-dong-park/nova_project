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
        .form-group{
            margin-top: 60px;
        }
    </style>

</head>
<body>

<div class="companyname text-center">
    <h1><a href="http://192.168.56.1/example/login&signup/index.php" style="color: #111111">Mans Shop</a></h1>
</div>


<div class="login-box">
    <link rel="stylesheet" href="loginstyle.css">
    <h2>로그인</h2>
    <form class="form-horizontal" action ="logincheck.php" method ="post" >
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text"placeholder="ID" name="userid" >
        </div>

        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password"placeholder="PW" name="userpw" >
        </div>
        <div>
            <input class="loginbtn" type="submit" name="button" value="로그인">
        </div>
    </form>
</div>

</body>
</html>
