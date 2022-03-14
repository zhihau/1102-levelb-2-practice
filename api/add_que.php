<?php
include_once "../base.php";

$Que->save(['text'=>$_POST['subject'],'parent'=>0]);
$id=$Que->math('max','id');
foreach($_POST['opt'] as $opt){

    $Que->save(['text'=>$opt,'parent'=>$id]);
}
to('../back.php?do=que');