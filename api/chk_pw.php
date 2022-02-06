<?php
include "../base.php";

$chk=$User->math('count','*',$_POST);
if($chk>0){
    $_SESSION['login']=$_POST['acc'];
    echo 1;
}else{
    echo 0;
}