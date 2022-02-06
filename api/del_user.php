<?php
include "../base.php";

if(isset($_POST['del'])){
    foreach($_POST['del'] as $del){
        $User->del($del);
    }
}
to('../back.php?do=admin');