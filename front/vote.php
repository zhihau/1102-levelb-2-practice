<?php
$subject=$Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁>問卷調查><?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
<form action="api/vote.php" method="post">
    <?php
    
    //$options=$Que->all(['parent'=>$subject['id']])
    $options=$Que->all(['parent'=>$_GET['id']]);
    foreach($options as $key => $opt){
    ?>
    <p>
        <input type="radio" name="opt" value="<?=$opt['id'];?>"><?=$opt['text'];?>
    </p>
    
    <?php
    }
    ?>
    <div class="ct">
        <input type="submit" value="我要投票">
    </div>
</form>

</fieldset>