<?php
function script($q) {    
    echo "<script>$q</script>";
}

function msg($m) {
    script("alert('$m')");
}
function move($u) {
    script("location.href='$u'");
}
function back($m = null) {
    if($m) msg($m);
    script("history.back();");
}
function msgMove($u, $m = null) {
    if ($m) msg($m);
    move($u);
}

?>