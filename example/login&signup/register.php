<?php

/////데이터베이스 연결.////
$conn = mysqli_connect("127.0.0.1","root",'Zxzx3709!');
mysqli_select_db($conn ,'alldata');


////데이터 베이스 저장 ///////
$sql = "INSERT INTO user (name,pass,id,phone,birth,address) VALUES(   


/////post로 넘겨받은 데이터를 저장.
'".$_POST['name']."', 
'".$_POST['pass']."'  , 
'".$_POST['id']."'  , 
'".$_POST['phone']."' , 
'".$_POST['birth']."'  , 
'".$_POST['address']."'  

)";


$result = mysqli_query($conn,$sql);
echo '<script> alert("회원가입을 하였습니다."); location.href="index.php"; </script>';


?>


<?php
