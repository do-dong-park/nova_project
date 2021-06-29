<form name="f" method="post">

    <input type="checkbox" id="c1" name="chk[]" value="3">
    <input type="checkbox" id="c2" name="chk[]" value="14">
    <input type="checkbox" id="c3" name="chk[]" value="5">
    <input type="checkbox" id="c4" name="chk[]" value="8">



    <br>



    <input type="button" value="삭제" onclick="historyDel()">
</form>



<script>
    function historyDel() {
        var form = document.f;
        var boo = false;                // 삭제할 항목을 체크했는지 여부 구분자



        if (document.getElementsByName("chk[]").length > 0) {
            for (var i=0;i<document.getElementsByName("chk[]").length;i++) {
                if (document.getElementsByName("chk[]")[i].checked == true) {
                    boo = true;
                    break;
                }
            }
        }



        if (boo) {
            form.action = "del_history.php";
            form.submit();
        } else {
            alert("개별 삭제하실 항목을 적어도 하나는 체크해 주십시오.");
        }
    }
</script>