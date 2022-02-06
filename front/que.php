<feildset>
<legend>目前位置：首頁 > 問卷調查</legend>
<div>問卷標題<input type="text" name="subject" id="subject"></div>
<div id="questions"><input type="text" name="opt[]" id="opt"><button onclick="more()">更多</button></div>
<div><button onclick="add()">新增問卷</button></div>
</feildset>
<script>

    function more(){
$('#questions').prepend("<input type='text' name='opt[]' >");
    }
    function add(){
        $.post('../api/add_que.php',,function(){
            
        })
    }
</script>