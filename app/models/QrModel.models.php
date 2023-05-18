<?php

class QrModel {

    public static function generateQrCode($url) {
if(isset($url)){
        // CHart Type
        $cht = "qr";
        $chs = "300x300";
        $chl = urlencode($url);
        $choe = "UTF-8";
        $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;

        return $qrcode;
    
}else{


    return "no url";

}

}
}
?>