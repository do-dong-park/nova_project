<?php

function make_thumb($file, $thumb, $t_width,$t_height)
{
    $source_image = imagecreatefromstring(file_get_contents($file)); //파일읽기
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    $virtual_image = imagecreatetruecolor($t_width, $t_height); //가상 이미지 만들기

    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $t_width, $t_height, $width, $height); //사이즈 변경하여 복사

    if(imagepng($virtual_image, $thumb)) // png파일로 썸네일 생성
    {
        echo "썸네일 처리 성공";
    }
    else {
        echo "썸네일 처리 실패";
    }


}

$original_image = "http://192.168.56.1/front_end/img/%EA%B8%B0%ED%83%80/%EC%9C%A0%EC%A0%80-%EA%B8%B0%EB%B3%B8%EC%9D%B4%EB%AF%B8%EC%A7%80.png";
$width = 100;
$height = 100;
make_thumb($original_image, 'http://192.168.56.1/front_end/img'.'('.$width.'x'.$height.')'.$original_image, $width, $height);

?>