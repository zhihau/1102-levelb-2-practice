<form action="api/vote.php" method="post">
<fieldset>
<?php
$subject=$Que->find($_GET['id']);
?>
<legend> 目前位置：首頁>  問卷調查 ><?=$subject['text'];?></legend>

<h4><?=$subject['text'];?></h4>
<?php
$rs=$Que->all(['parent'=>$subject['id']]);
foreach($rs as $k=>$r){

?>
<div> <input type="radio" name="vote" value="<?=$r['id'];?>"><?=$r['text'];?>
</div>
<?php
}
?>
<input type="hidden" name="subjectid" value="<?=$subject['id'];?>">
<div class="ct">
    <input type="submit" value="我要投票">
    </div>
</fieldset>
</form>