<form action="api/edit_news.php" method="post">
    <fieldset>
        <table>
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
    $all=$News->math('count','*');
    $div=3;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    $rows=$News->all(" limit $start,$div");
    foreach($rows as $k=>$row){
        $checked=($row['sh']==1)?"checked":"";
            ?>
            <tr>
                <td><?=$k+1;?></td>
                <td><?=$row['title'];?></td>
                <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=$checked?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>" ></td>
            </tr>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
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
    <div class="ct">
    <input type="submit" value="確定修改">
    
    </div>
    </fieldset>
</form>