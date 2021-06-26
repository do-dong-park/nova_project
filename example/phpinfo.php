<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th><input type="checkbox" name="_selected_all_"></th>
        <th>제목</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><input type="checkbox" name="_selected_" value="ROW_1"></td>
        <td>안녕하세요</td>
    </tr>
    <tr>
        <td><input type="checkbox" name="_selected_" value="ROW_2"></td>
        <td>반갑습니다</td>
    </tr>
    <tr>
        <td><input type="checkbox" name="_selected_" value="ROW_3"></td>
        <td>Good Luck!</td>
    </tr>
    </tbody>
</table>
</body>
</html>


<script>//----------------------------------------------------------------------------
    // 전체선택 및 해제 기능은..

    $('input[name=_selected_all_]').on('change', function () {
        $('input[name=_selected_]').prop('checked', this.checked);
    });


    //----------------------------------------------------------------------------
    // 선택한 Checkbox 값을 가져오는 방법은...

    // var arr = $('input[name=_selected_]:checked').serializeArray().map(function (item) {
    //     return item.value
    // });

    var arr = $('input[name=_selected_]:checked').serialize(); // 이건 QueryString 방식으로
</script>
