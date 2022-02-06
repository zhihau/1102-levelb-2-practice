<?php
include "../base.php";

$news=$News->find(['id'=>$_POST['news']]);
$type=$_POST['type'];
switch($type){
    case 1:
        $news['good']++;
        $News->save($news);
        $Log->save(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
        break;
    case 2:
        $news['good']--;
        $News->save($news);
        $Log->del(['news'=>$_POST['news'],'user'=>$_SESSION['login']]);
        break;

}