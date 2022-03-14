<fieldset>
    <legend>
    目前位置：首頁>  問卷調查
    </legend>
    <table>
        <tr>
            <td>編號</td>
            <td>問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
        <?php
        
        $rs=$Que->all(['parent'=>0]);
        
        foreach($rs as $k=>$r){
        ?>
        <tr>
            <td><?=$k+1;?></td>
            <td><?=$r['text'];?></td>
            <td><?=$r['count'];?></td>
            <td><a href="?do=result&id=<?=$r['id'];?>">結果</a></td>
            <td>
            <?php
            if(!isset($_SESSION['login'])){
                echo "<a href='?do=login'>請先登入</a>";
            }else{
                echo "<a href='?do=vote&id={$r['id']}'>參與投票</a>";

            }
            ?>
            
        
        </td>
        </tr>
        <?php
        }
        ?>
    </table>

</fieldset>