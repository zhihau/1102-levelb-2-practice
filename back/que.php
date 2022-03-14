<form action="api/add_que.php" method="post">
    <fieldset>
        <legend>新增問卷</legend>
    
        <div>
        問卷名稱<input type="text" name="subject" id="subject">
        </div>
        <div id="opts">
    
            <div>
            選項<input type="text" name="opt[]" id=""><button type="button"onclick="more()">更多</button>
            </div>
        </div>
        <div>
    <input type="submit" value="新增"><input type="reset" value="清空">
        </div>
    
    </fieldset>
</form>
<script>
    function more(){
        let html=`
        <div>
            選項<input type="text" name="opt[]" id="">
            </div>
        `
        $('#opts').prepend(html)
    }
</script>