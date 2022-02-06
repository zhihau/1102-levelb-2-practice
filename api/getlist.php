<?php
include "../base.php";

$rows=$News->all($_POST);
if(!empty($rows)){
foreach($rows as $row){
    echo "<p>";
    echo "<a href='#' onclick='shownews({$row['id']})'>{$row['title']}</a>";
    echo "</p>";
}
}