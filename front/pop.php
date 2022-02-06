<fieldset>
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
        $tarray=[
"1"=>"健康新知",
"2"=>"菸害防治",
"3"=>"癌症防治",
"4"=>"慢性病防治",

        ];
$all=$News->math('count','*',['sh'=>1]);
$div=5;
$pages=ceil($all/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;
$rows=$News->all(['sh'=>1],"order by `good` desc limit $start,$div");
foreach($rows as $row){
        ?>
        <tr>
            <td class="switch"><?=$row['title']?></td>
            <td class="switch">
                <div class="short"><?=mb_substr($row['text'],0,20);?>...</div>
                <div class="pop" >
                    <h2 style="color:skyblue"><?=$tarray[$row['type']]?></h2>
                    <?=nl2br($row['text'])?>
                </div>
            </td>
            <td>
                <span><?=$row['good']?></span>個人說<img src="../icon/02B03.jpg" width="24px"> - 
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
        $(this).parent().find('.pop').toggle();
    })
    $('.g').on('click',function(){
        news=$(this).data('news');
        type=$(this).data('type');
        $.post('../api/good.php',{news,type},()=>{
            location.reload();
//             switch(parseInt(type)){
//                 case 1:

//                 $(this).text('回收讚');
//                 $(this).data('type',2);
//                 break;
//                 case 2:

// $(this).text('讚');
// $(this).data('type',1);
// break;
//             }
        })
    })
</script>