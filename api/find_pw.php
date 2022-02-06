<?php
include "../base.php";

$row=$User->find($_POST);

if(empty($row)){
    echo "無此資料";
}else{
    echo "您的密碼為：".$row['pw'];
}