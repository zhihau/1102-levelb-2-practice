<?php
include_once "../base.php";


$c=$User->find($_POST);
if($c){
    echo "您的密碼為：".$c['pw'];
}else{
    echo "查無此資料";
}