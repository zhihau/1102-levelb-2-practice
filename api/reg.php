<?php
include_once "../base.php";


$c=$User->save($_POST);
if($c>0){
    echo 1;
}else{
    echo 0;
}