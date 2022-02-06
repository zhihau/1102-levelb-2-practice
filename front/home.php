<style>
    .taglist{
        display:flex;
        margin-top:-1px;
    }
    .tag{
        border:1px solid #555;
        cursor: pointer;
        background:#ccc;
        padding:5px 8px;
        margin-top:-1px;
    }
    .tag:hover{
        background:#ddd;
        color:white;
        
    }
    .text{
        border:1px solid #555;
        /* background:#ddd; */
    }
    .active{
        background:white;
        border-bottom-color:white;
    }
</style>
<div>

    <span style="width:18%; display:inline-block;">
    <?php
    
    if(!isset($_SESSION['login'])){
        ?>
    <a href="?do=login">會員登入</a>
        <?php
    }else{
        if($_SESSION['login']=='admin'){
        ?>
歡迎admin, <a href="#">管理</a>|<a href="index.php?do=logout">登出</a>
<?php
        }else{
            ?>
            歡迎<?=$_SESSION['login']?>, <a href="index.php?do=logout">登出</a>
            <?php
        }
    }
    ?>
    </span>
    <?php
$rows=$News->all();

    ?>
    <div class="taglist">
        <?php
        foreach($rows as $key=>$row){
    
       
        ?>
        <div class="tag" id="tag<?=$key+1?>"><?=$row['title']?></div>
        <?php
         }
         ?>
    </div>
    <?php
        foreach($rows as $key=>$row){
    
       
        ?>
    <div class="text" id="text<?=$key+1?>" style="display:none;">
        <div>
<?=$row['title']?>
        </div>
        <div>
            <pre><?=nl2br($row['text'])?></pre>
        </div>
    </div>
    <?php
         }
         ?>
</div>
<script>
    $('#tag1').addClass('active');
    $('#text1').show();
    $('.tag').on('click',function(){
        let id=$(this).attr('id').replace('tag','');
        $('.tag').removeClass('active');
        $('.text').hide();
        $(this).addClass('active');
        $('#text'+id).show();

    })
</script>