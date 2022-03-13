<?php
include_once "../base.php";


$c=$User->math('count','*',$_POST);
if($_POST['acc']=='admin'&&$_POST['pw']=="1234"){
    $c=1;
}
if($c>0){
    echo 1;
    $_SESSION['login']=$_POST['acc'];
}else{
    echo 0;
}