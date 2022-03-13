<fieldset>
<?php
$subject=$Que->find($_GET['id']);
?>
<legend> 目前位置：首頁>  問卷調查 ><?=$subject['text'];?></legend>

<h4><?=$subject['text'];?></h4>
<?php
$rs=$Que->all(['parent'=>$subject['id']]);
foreach($rs as $k=>$r){

    $total=$subject['count']>0?$subject['count']:1;
    $rate=round($r['count']/$total,2);
    $length=$rate*80;
    $num=$rate*100;

?>
<div style="display:flex">
    <div style="width:45%"><?=$k+1;?>.<?=$r['text'];?></div>
    <div>
        <div style="width:<?=$length?>%;background:darkgray">&nbsp;</div>
        <div><?=$r['count'];?>票(<?=$num?>%)</div>
        
    </div>
</div>
<?php
}
?>
<div class="ct"><button onclick="location.href='?do=que'">返回</button></div>
</fieldset>