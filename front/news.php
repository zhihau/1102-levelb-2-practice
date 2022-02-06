<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
$all=$News->math('count','*',['sh'=>1]);
$div=5;
$pages=ceil($all/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;
$rows=$News->all(['sh'=>1],"limit $start,$div");
foreach($rows as $row){
        ?>
        <tr>
            <td class="switch"><?=$row['title']?></td>
            <td class="switch">
                <div class="short"><?=mb_substr($row['text'],0,20);?>...</div>
                <div class="full" style="display:none"><?=nl2br($row['text'])?></div>
            </td>
            <td>
                <?php
if(isset($_SESSION['login'])){
    $chk=$Log->math('count','*',['news'=>$row['id'],'user'=>$_SESSION['login']]);
    if($chk>0){
        echo "<a href='#' class='g' data-news='{$row['id']}' data-type='2' >回收讚</a>";
    }else{
        echo "<a href='#' class='g' data-news='{$row['id']}' data-type='1' >讚</a>";
    }
    
}
                ?>
            </td>
        </tr>
        <?php
}
        ?>
    </table>
</fieldset>
<script>
    $('.switch').on('click',function(){
        $(this).find('.short,.full').toggle();
    })
    $('.g').on('click',function(){
        news=$(this).data('news');
        type=$(this).data('type');
        $.post('../api/good.php',{news,type},()=>{
            switch(parseInt(type)){
                case 1:

                $(this).text('回收讚');
                $(this).data('type',2);
                break;
                case 2:

$(this).text('讚');
$(this).data('type',1);
break;
            }
        })
    })
</script>