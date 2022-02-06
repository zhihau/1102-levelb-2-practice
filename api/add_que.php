<?php
include "../base.php";

$Que->save(['text'=>$_POST['subject']]);
$parent=$Que->math('max','id');
foreach($_POST['opt'] as $opt){
    $Que->save(['text'=>$opt,'parent'=>$parent,'count'=>0]);
}
to("../back.php?do=que");