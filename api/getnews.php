<?php
include "../base.php";

$news=$News->find($_POST);
if(!empty($news)){
    echo nl2br($news['text']);
}