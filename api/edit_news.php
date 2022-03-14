<?php
include_once "../base.php";

foreach($_POST['id'] as $id){
    if(isset($_POST['del'])&& in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        // edit news
        $n=$News->find($id);
        $n['sh']=isset($_POST['sh'])&&in_array($id,$_POST['sh'])?1:0;
        $News->save($n);
    }
}
to('../back.php?do=news');