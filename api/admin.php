<?php
include_once "../base.php";

foreach($_POST['id'] as $id){
    if(isset($_POST['del'])&&in_array($id,$_POST['del'])){
        $User->del($id);
    }
}
to('../back.php?do=admin');