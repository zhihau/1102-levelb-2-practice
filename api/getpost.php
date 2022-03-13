<?php
include_once "../base.php";

$r=$News->find($_POST);
echo nl2br($r['text']);