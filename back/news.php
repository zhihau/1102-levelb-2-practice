<fieldset style="display:flex">
    <legend>目前位置：首頁 > 分類網誌</legend>



<table>
    <tr>
        <td  width="40%" style="vertical-align: top;">
        <fieldset>
    <legend>標題</legend>
    <?php
$rows=$News->all();
foreach($rows as $row){
    ?>
    <div><?=$row['title']?></div>
    <?php
    }
    ?>
</fieldset>
        </td>
        <td  width="55%">

        <fieldset width="60%">
    <legend>內容</legend>
    <?php
    $all=$News->math('count','*');
    $div=5;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
$rows=$News->all();

foreach($rows as $row){
    ?>
    
    <div class="switch">
        <div class="short-text"><?=mb_substr($row['text'],0,20);?>...</div>
        <div class="full-text" style="display:none"><?=nl2br($row['text']);?></div>
    </div>
    <?php
    }
    ?>
</fieldset>
        </td>
    </tr>
</table>
<br>
<div>
    <?php
    if($now-1>0){
        $prev=$now-1;
        echo "<a href='index.php?do=news.php&p=$prev'>";
        echo " < ";
        echo "</a>";
    }
    for($i=1;$i<=$pages;$i++){
        $size=($i==$now)?"24px":"16px";
        echo "<a href='index.php?do=news.php&p=$i' style='$size'>";
        echo $i;
        echo "</a>";
    }
    if($now+1<=$pages){
        $next=$now+1;
        echo "<a href='index.php?do=news.php&p=$next'>";
        echo " > ";
        echo "</a>";
    }
    ?>
</div>

<script>
    $('.switch').on('click',function(){
        // console.log($(this).find('full-text'));
        $(this).find('.short-text,.full-text').toggle();
    })
</script>
</fieldset>