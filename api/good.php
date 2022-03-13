<?php
include_once "../base.php";


switch($_POST['type']){
    case 1:
        $n=$News->find($_POST['news']);
        $n['good']++;
        $News->save($n);
        echo $n['good'];
        $Log->save(['news'=>$_POST['news'],'user'=>$_POST['user']]);
        break;
    case 2:
        $n=$News->find($_POST['news']);
        $n['good']--;
        $News->save($n);
        echo $n['good'];
        $Log->del(['news'=>$_POST['news'],'user'=>$_POST['user']]);
        break;
}