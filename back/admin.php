<fieldset>
    <legend>帳號管理</legend>

    <form action="api/admin.php" method="post">
        <table>
            <tr>
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
        $rs=$User->all();
        foreach($rs as $r){
            ?>
            <tr>
                <td><?=$r['acc'];?></td>
                <td><?=str_repeat("*",mb_strlen($r['pw']));?></td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$r['id'];?>">
                </td>
            </tr>
            <input type="hidden" name="id[]"  value="<?=$r['id'];?>">
            <?php
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
    </form>

    <h1>新增會員</h1>
    <div style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><button onclick="reg()">註冊</button><button onclick="reset()">清除</button></td>
            <td>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function reset(){
        $("#acc,#pw,#pw2,#email").val("");
    }
    function reg(){
        let user={
            acc:$('#acc').val(),
            pw:$('#pw').val(),
            pw2:$('#pw2').val(),
            email:$('#email').val(),
        }
        if(user.acc==""||user.pw==""||user.pw2==""||user.email==""){
            alert("不可空白")
        }else{
            if(user.pw!=user.pw2){
                alert("密碼錯誤")
            }else{

                $.post('api/chk_acc.php',{acc:user.acc},function(chk){
                    if(parseInt(chk)==1){
                        alert("帳號重複")
                        
                    }else{
                        delete user.pw2;
                        $.post('api/reg.php',user,function(chk){
                        if(parseInt(chk)==0){
                            alert("新增會員失敗")
                            
                        }else{
                            alert("新增會員成功")
                            location.href="back.php?do=admin"
                            }
                        })
                    }
                })
            }
        }

    }
</script>