<fieldset>
    <legend>會員註冊</legend>
    <table>
        <tr>
            <td>登入帳號：</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>登入密碼：</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>再次確認密碼：</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>信箱：(找回密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
<button onclick="reg()">註冊</button><button onclick="reset()">清除</button>
            </td>
            <td>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function reset(){
        $('#acc,#pw,#pw2,#email').val("");
    }
    function reg(){
        let user={
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            pw2:$('#pw2').val(),
            email:$('#email').val(),
        }
        if(user.acc==""||user.pw==""||user.pw2==""||user.email==""){
            alert("不能為空白");
        }else{
            if(user.pw!=user.pw2){
                alert("錯誤密碼");
            }else{
                $.post('../api/chk_acc.php',{acc:user.acc},function(chk){
                    if(parseInt(chk)==1){
                        alert("重複帳號");
                    }else{
                        delete user.pw2;
                        $.post('../api/reg.php',user,function(chk){
                            if(parseInt(chk)==1){
                                alert("註冊成功，歡迎加入");
                                location.href="index.php?do=login";
                            }
                            })
                    }
                })
            }
        }
    }
</script>