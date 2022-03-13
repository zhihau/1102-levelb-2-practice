<?php
include_once "../base.php";

$rs=$News->all($_POST);
foreach($rs as $r){
    echo "<a href='#' onclick='getpost({$r['id']})'>{$r['title']}</a>";
}