<?php
include_once "../base.php";


$c=$User->math('count','*',$_POST);
if($c>0){
    echo 1;
}else{
    echo 0;
}