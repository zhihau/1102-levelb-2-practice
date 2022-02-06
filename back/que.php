<feildset>
    <form action="../api/add_que.php" method="post">
<legend>目前位置：首頁 > 問卷調查</legend>
<div>問卷標題<input type="text" name="subject" id="subject"></div>
<div id="questions"><input type="text" name="opt[]" id="opt"><button type="button" onclick="more()">更多</button></div>
<div>
    <input type="submit" value="新增問卷">
    <input type="reset" value="清除">
</div>
</form>
</feildset>
<script>

    function more(){
$('#questions').prepend("<input type='text' name='opt[]' >");
    }
</script>