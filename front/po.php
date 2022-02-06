<fieldset style="display:flex">
    <legend>目前位置：首頁 > 分類網誌 > <span id="navtype">健康新知</span></legend>
    <fieldset width="40%">
        <legend>分類網誌</legend>
        <div class="type" id="t1">健康新知</div>
        <div class="type" id="t2">菸害防治</div>
        <div class="type" id="t3">癌症防治</div>
        <div class="type" id="t4">慢性病防治</div>
    </fieldset>
    <fieldset  width="60%">
        <legend>文章列表</legend>
        <div id="newslist"></div>
        <div id="news"></div>
    </fieldset>
</fieldset>

<script>
    showlist(1);
    $('.type').on('click',function(){
        $('#navtype').text($(this).text());
        let id=$(this).attr('id').replace('t','');
        showlist(id);
    })
    function showlist(id){
        $.post('../api/getlist.php',{'type':id},function(res){
$('#newslist').html(res);
$('#newslist').show();
$('#news').hide();
        })
    }
    function shownews(id){
        $.post('../api/getnews.php',{'id':id},function(res){
$('#news').html(res);
$('#news').show();
$('#newslist').hide();
        })
    }
</script>