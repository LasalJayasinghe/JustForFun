<?php

function show($stuff){
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

function set_value($key){
    if(!empty($_POST[$key])){
        return $_POST[$key];
        die;
    }
    return false;
}
function set_select($key, $value, $default=''){
    if(!empty($_POST[$key])){
        if($_POST[$key] == $value){
            return ' selected ';
        }
    }else{
        if($default == $value){
            return ' selected ';
        }
    }
    return '';
}

function redirect($link){
    header('Location: '.ROOT."/".$link);
    die;
}

function message($msg = ''){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }
    else{
        if(!empty($_SESSION['message'])){
            $msg = $_SESSION['message'];
            return $_SESSION['message'];
            unset($msg);
        }else{
            return false;
        }
    }
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function truncate($string, $length=140){
    if(strlen($string) > $length){
        return substr($string, 0, $length).'...';
    }
    return $string;
}


function esc($str){
    return nl2br(htmlspecialchars($str));
}