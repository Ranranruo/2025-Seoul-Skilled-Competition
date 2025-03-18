<?php
function script($q) {
    echo "<script>$q</script>";
}
function alert($m) {
    script("alert('$m')");
}
function move($u) {
    script("location.href='$u'");
}
