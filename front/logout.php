<script>
    $.post('../api/logout.php',{},function(){
        location.href="index.php";
    })
</script>