<?php
    # 1
    session_start();
    # 2
    function randText() {
        # 3
        $txt="ABCDEFGHIJKLMNOPQRSTUWXYZabcdefghijklmnopqrstuwxyz0123456789";
        # 4
        $str="";
        # 5
        for($i=0;$i<5;$i++) {
            # 6
            $index=rand(0,strlen($txt)-1);
            # 7
            $str.=$txt[$index];
        }
        # 8
        return $str;
    }
    # 9
    header("Content-type:image/png");
    # 10
    $image=imagecreate(70,30);
    # 11
    $backColor=imagecolorallocate($image,168,167,165);
    # 12
    $txtColor=imagecolorallocate($image,250,250,250);
    # 13
    $code = randText();
    # 14
    $_SESSION["captcha"]=$code;
    # 15
    imagestring($image,5,15,7,$code,$txtColor);
    # 16
    imagepng($image);
    # 17
    imagecolordeallocate($image, $backColor);
    # 18
    imagecolordeallocate($image, $txtColor);
    # 19
    imagedestroy($image);
    
?>