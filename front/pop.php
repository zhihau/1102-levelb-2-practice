<fieldset>
    <legend>
    目前位置：首頁> 人氣文章區
    </legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $all=$News->math('count','*');
        $div=5;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
        $rs=$News->all(['sh'=>1]," order by good desc limit $start,$div");
        
        foreach($rs as $r){
        ?>
        <tr>
            <td class="switch"><?=$r['title'];?></td>
            <td class="switch">
                <div class="t-short"><?=mb_substr($r['text'],0,20);?>...</div>
                <div class="t-full ssaa" style="display:none">
                <div><?=$r['title'];?></div>
                <?=nl2br($r['text']);?></div>
            </td>
            <td>
<?php
    echo "<span>".$r['good']."</span>個人說<img src='../icon/02B03.jpg' width='24px' height='24px'>";
if(isset($_SESSION['login'])){
    if($r['good']>0){
echo "- <a href='#' class='g' data-user='{$_SESSION['login']}' data-news='{$r['id']}' data-type='2'>收回讚</a>";
}else{
        echo "- <a href='#' class='g' data-user='{$_SESSION['login']}' data-news='{$r['id']}' data-type='1'>讚</a>";

    }
}
?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <?php
        if(($now-1)>0){
            $pre=$now-1;
            echo "<a href='?do=news&p=$pre'> &lt; </a>";
        }
        for($i=1;$i<=$pages;$i++){
            $s=($i==$now)?"24px":"16px";
            echo "<a href='?do=news&p=$i' style='font-size:$s'> $i </a>";
        }
        if(($now+1)<=$pages){
            $next=$now+1;
            echo "<a href='?do=news&p=$next'> &gt; </a>";
        }

        ?>
    </div>

</fieldset>
<script>
    $('.switch').hover(function(){
        $(this).find(".t-short,.t-full").toggle();
    })
    $('.g').on('click',function(){
        let good={
            news:$(this).data('news'),
            user:$(this).data('user'),
            type:$(this).data('type'),
        }
        console.log(good)
        $.post('api/good.php',good,(res)=>{
            $(this).siblings('span').text(res);
            switch(parseInt(good.type)){
                case 1:
                    $(this).text("收回讚")
                    $(this).data('type','2')
                    break;
                    case 2:
                        $(this).text("讚")
                        $(this).data('type','1')
                        break;
                    }
                    console.log($(this).data('type'))
        })
    })
</script>