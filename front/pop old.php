<fieldset style="display:flex">
    <legend>目前位置：首頁 > 人氣文章</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td>狀態</td>
        </tr>
        <?php
         $all=$News->math('count','*');
         $div=3;
         $pages=ceil($all/$div);
         $now=$_GET['p']??1;
         $start=($now-1)*$div;
        $rows=$News->all();
foreach($rows as $row){


        ?>
        <tr>
            <td><?=$row['title']?></td>
            <td>
                <div class="news"><?=mb_substr($row['text'],0,20);?>...</div>
                <div class="pop news" style="display:none"><?=nl2br($row['text'])?></div>
            </td>
            <td>
               <span><?=$row['good']?></span>個人說<img src="../icon/02B03.jpg" width="24px">
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>
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
    $('.news').hover(function(){
        console.log($(this));
        $(this).toggle();
        $(this).siblings().toggle();
    })

</script>