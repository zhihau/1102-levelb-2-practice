<div>目前位置：首頁> 分類網誌> <span id="navtype">健康新知<span></div>

<div style="display:flex">
<fieldset style="width:50%">
    <legend>分類網誌</legend>
    <div class="t" id="t1">健康新知  </div>
    <div class="t" id="t2">菸害防治</div>
    <div class="t" id="t3">癌症防治</div>
    <div class="t" id="t4">慢性病防治</div>
</fieldset>
<fieldset style="width:50%">
    <legend>文章列表</legend>
    <div class="list"></div>
    <div class="news"></div>
</fieldset>
</div>
<script>
    showList(1);
    $(".t").on('click',function(){
        $('#navtype').text($(this).text())
        
        id=$(this).attr('id').replace('t','');
        showList(id);
    })
    function showList(type){
        $.post('api/getlist.php',{type},function(res){
            $('.list').html(res);
            $('.list').show();
            $('.news').hide();
        })
    }
    function getpost(id){
        $.post('api/getpost.php',{id},function(res){
            $('.news').html(res);
            $('.list').hide();
            $('.news').show();
        })
    }
</script>