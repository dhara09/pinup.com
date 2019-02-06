<script type="text/javascript">
function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}
</script>
<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
<input type="text" name="code">
<input type="text" value="<?=$rand?>" id="ran" readonly="readonly">
<input type="hidden" name="chk" value="<?=$rand?>">
<input type="button" value="Refresh" onclick="captch()" />
<input type="submit" name="check">
</form>