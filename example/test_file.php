<?php
class Test{
    public function print(){
        echo $this->data;
    }
}
$obj = new Test();
?>
<!DOCTYPE html>
<html>
<head>
    <title>title</title>
</head>
<body>
<?=$obj->print()?>
</body>
</html>